$(document).ready(function(){
    
    // Default vat percent from DB
    vat = $('body').data('vat');

    // Default Root 
    root = $('body').data('link');
    
    // print 
    $('#modal_print').on('click','#print',function(){
        window.print();
    });

    // hidden menu left
    $('.navbar-top').addClass('sidebar-xs');

    // Token CSRF
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    
    // Default Modal id
    parent_private = '#modalOne';

     // Modal in Modal Fix overflow
     $('.modal').on('click','.modal_fix_overflow',function(){
        $('body').addClass('modal-open1');
    });

    // Modal popup in Modal
    $(parent_private).on('click','.modal_modal_close',function(){
        $('body').removeClass('modal-open1');
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // MD Library
    $('[data-toggle="popover"]').popover();
    $('.mdb-select').materialSelect();

    //----------------------- Invoice -----------------------------

    // btn create invoice
    $('.card').on('click','#btn-create',function(){

        parent_private = $(this).data('target');
        invoice_type   = $(this).data('vat');
        link           = $('body').data('link');
       
        $(parent_private+' .md-overlay').show();
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');
        
        $.ajax({
            type : 'post',
            data : { link : link, invoice_type : invoice_type },
            url : 'invoice/form_create_invoice',
            success : function(respond){
                setTimeout(function(){             
                    $(parent_private+' .md-overlay').hide();
                    $(parent_private+' .modal-default').addClass('blowup');
                    $(parent_private+' .modal-body').html(respond);
                    $(parent_private+' #contact_person').materialSelect();
                    $(parent_private+' #payment_method').materialSelect();
                    $(parent_private+' .type').materialSelect();
                    $(parent_private+' .new-row').val(invoice_type);
                    App.initCardActions();
                }, 1000);
            }
        });
    });

     // btn edit invoice
     $('.table-responsive').on('click','#btn-edit',function(){
        id      = $(this).val();
        link    = $('body').data('link');
        invoice_type = $(this).data('status-vat');
        $(parent_private+' .md-overlay').show();
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');

        $.ajax({
            type : 'post',
            data : {id : id, link : link},
            url  : 'invoice/form_edit_invoice',
            success : function(respond){
                setTimeout(function(){             
                    $(parent_private+' .md-overlay').hide();
                    $(parent_private+' .modal-default').addClass('blowup');
                    $(parent_private+' .modal-body').html(respond);
                    $(parent_private+' #contact_person').materialSelect();
                    $(parent_private+' #payment_method').materialSelect();
                    $(parent_private+' .type').materialSelect();
                    $(parent_private+' .new-row').val(invoice_type);
                    App.initCardActions();
                }, 1000);
            }
        });
    });

    
    // btn print invoice
    $('.table-responsive').on('click','#btn-print',function(){
        id      = $(this).val();
        number  = $(this).attr('data-invoice-number');

        $(parent_private+' .md-overlay').show();
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');

        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice/form_print_invoice',
            success : function(respond){
                setTimeout(function(){ 
                    $(parent_private+' .md-overlay').hide();
                    $(parent_private+' .modal-default').addClass('blowup');
                    $(parent_private+' .modal-body').html(respond);
                }, 1000);
            }
        });
    });

    // btn cancel invoice
    $('.table-responsive').on('click','#btn-cancel-invoice',function(){
        id      = $(this).val();
        number  = $(this).attr('data-invoice-number');

        $(parent_private+' .md-overlay').show();
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');

        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice/form_cancel_invoice',
            success : function(respond){
                setTimeout(function(){ 
                    $(parent_private+' .md-overlay').hide();
                    $(parent_private+' .modal-default').addClass('blowup');
                    $(parent_private+' .modal-body').html(respond);
                }, 1000);
            }
        });
    });
     

    //----------------------- Auto Complete -----------------------------

    // AutoComplete Customer
    $(parent_private).on('keyup','#cusNameEn',function(){
        
        var name = $(this).val();
        json = [];
        var z = 0;

        // Clear 
        $(parent_private+' #customer_id').val('');
        $(parent_private+' #contactPerson').val('');
        $(parent_private+' #CustomerAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');
        $(parent_private+' #contactPerson').html('');
        $(parent_private+' #phone').val('');

        // Ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'invoice/auto_customer',
            success : function(respond){  
                json  = jQuery.parseJSON(respond);
                var html = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
                if ( json.length != 0 ) {
                    $.each(json, function (i, obj) {                            
                        html += '<li class="customer list-group-item list-group-item-action" id="acceptCustomer" phone-data="'+i+'" customer_id="'+obj.id+'" >'+obj.name_en +'</li>';
                        z++;                            
                    });  
                }
                html += '</ul></div>';
                $(parent_private+' .AutoDisplay_Customer').html(html);
                
            }
        });     

        // Accept Customer
        $(parent_private).on('click','#acceptCustomer',function(){
            var customer_id = $(this).attr('customer_id');
            var phone_data = $(this).attr('phone-data');
            var opt = '<select class="mdb-select md-form m-0 w-100 dashed mdbContact" name="contact_person">';
            $(parent_private+' #customer_id').val(customer_id);
            $(parent_private+' #cusNameEn').val($(this).text());
            $(parent_private+' .AutoDisplay_Customer').text('');
            $(parent_private+' #CustomerAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
            $.each(json[phone_data].contacts, function (i, contact) {
                opt += '<option value="'+contact.id+'" phone="'+contact.phone+'">'+contact.full_name+'</option>';
            });
            opt += '</select>';
            $(parent_private+' #contactPerson').html(opt);
            $(parent_private+' .mdbContact').materialSelect();
            $(parent_private+' #phone').val(json[phone_data].contacts[0].phone); 
        }); 

        // selected get contact
        $(parent_private).on('change','.mdbContact',function(){
            var contact = $('option:selected', this).attr('phone');
            $(parent_private+' #phone').val(contact);
        });
    
    });

    // AutoComplete Supplier
    $(parent_private).on('keyup','#supNameEn',function(){
        var supplier_name = $(this).val();
        link              = $('body').data('link');

        // Clear 
        $(parent_private+' #supplier_id').val('');
        $(parent_private+' #SupplierAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');

        // Ajax
        $.ajax({
            type : 'post',
            data : {supplier_name : supplier_name,link : link},
            url  : 'invoice/auto_supplier',
            success : function(respond){    
                $(parent_private+' .AutoDisplaySup').html(respond);
            }
        });

        // Accept Supplier
        $(parent_private).on('click','#acceptSupplier',function(){
            $(parent_private+' #supplier_id').val($(this).attr('supplier_id'));
            $(parent_private+' #supNameEn').val($(this).text());
            $(parent_private+' .AutoDisplaySup').text('');
            $(parent_private+' #SupplierAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
        });
    });

    // -------------------------- Addon Script ------------------------------

    //to check all checkboxes
     $(parent_private).on('click','#btnCheck_all',function(){
        //alert(parent_private);
        $(this).toggleClass('check_false');
        check_all(parent_private);
        Btndelete();
    });

    // click one-by-one
    $('.table-responsive').on('click','#btnCheck_single',function(){        
        Btndelete();
    });
    
    //deletes the selected table rows
    $(parent_private).on('click','#delete',function(){
        $(parent_private+' .Bchk:checkbox:checked').parents("tr").remove();
        if($(parent_private+' #btnCheck_all').hasClass('check_false')){
            
        }else{
            $(parent_private+' #btnCheck_all input').prop('checked', false);
        }
        calculate_price();
        //calculate_SerFee();
        calculate_vat();
        deposit      = $(parent_private+' #deposit_total').val();
        price_Total  = calculate_price();
        exchage_riel = $(parent_private+' #exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
        
        $(parent_private+' #Amount_total').val( price_Total.toFixed(2));
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));

        // service fee
        servicefee      = $(parent_private+' #SerFee_price').val();
        count_passenger = $(parent_private+' .price').length;        
        servicefee_total = parseFloat(servicefee) * parseFloat(count_passenger);
        vat_total        = parseFloat(servicefee_total)/parseFloat(vat);
        $(parent_private+ ' #SerFee_total').val(servicefee_total.toFixed(2));
        $(parent_private+ ' #vat_total').val(vat_total.toFixed(2));

    });

    // Double Click
    $(parent_private).on('dblclick','td[id^="hidMode_"]',function(){  

        $('#modalTwo').modal('show');
        Hmode   = $(this).attr('id');
        id      = Hmode.split("_");
        $('#modalTwo .modal-default').removeClass('blowup out');
        $('#modalTwo .md-overlay').show();
        $('#modalTwo .modal-body').html('');
        el = '<style>#modalTwo .modal-default{max-width: 110px!important;min-width: 40%!important;}</style>';
        el = '<div class="bg-primary p-2  d-flex justify-content-center">Description</div>';
        el  += '<div class="md-form mx-5">';
            el += '<input type="number" step="0.01" id="modalNF" class="form-control ml-0">';
        el += '</div>';
        el += '<div class="text-center my-4">';
            el += '<button class="btn btn-info waves-effect waves-light modal_fix_overflow" data-dismiss="modal">Save and Close';
                el += '<i class="fas fa-sign-in ml-1"></i>';
            el += '</button>';
        el += '</div>';

        setTimeout(function(){  
            $('#modalTwo .modal-body').html(el);
            $('#modalTwo .md-overlay').hide();
            $('#modalTwo .modal-default').addClass('blowup');
            
            value   = $(parent_private+' #np_'+id[1]).val();        
            $('#modalTwo #modalNF').val(value);
        },1000);

        $('#modalTwo').on('change','#modalNF',function(){                
            var Mnf = $(this).val();
            $(parent_private+' #np_'+id[1]).val(Mnf);
        });

    });

    // close modal blowdown
    $('.modal').on('click','.btn-close',function(){
        parent = $(this).data('modal');
       $(parent+' .modal-default').addClass('out');
       setTimeout(function(){  
           $(parent).modal('hide');
       }, 300);
       loop = 1;
   });



    // -------------------------- Payment ---------------------------------

     // btn payment data-table & create
     $('.table-responsive').on('click','#btn-payment',function(){
        id      = $(this).val();
        amount  = $(this).attr('data-amount');
        number  = $(this).attr('data-invoice-number');

        // Show Overlay
        $(parent_private+' .md-overlay').show();

        // clear modal data
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');

        $.ajax({
            type : 'post',
            data : {id : id, amount : amount},
            url  : 'invoice/table_payment',
            success : function(respond){
                setTimeout(function(){                    
                    // Show Overlay
                    $(parent_private+' .md-overlay').hide();

                    $(parent_private+' .modal-default').addClass('blowup');
                    $(parent_private+' .modal-body').html(respond);
                    $(parent_private+' #P_paymentMethod').materialSelect();
                    $(parent_private+' #P_payment_method').materialSelect();
                    App.initCardActions();
                    $(parent_private+' .invoice-number').text(number);

                }, 1000);
            }
        });
    });

    // btn payment edit 
    $(parent_private).on('click','#btn-edit',function(){
        id = $(this).val();
        modal = '#modalTwo';
        // Show Overlay
        $(modal+' .md-overlay').show();
        // clear modal data
        $(modal+' .modal-default').removeClass('blowup out');
        $(modal+' .modal-body').html('');
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice/form_edit_payment',
            success : function(respond){
                setTimeout(function(){                    
                    // Show Overlay
                    $(modal+' .md-overlay').hide();
                    $(modal+' .modal-default').addClass('blowup');
                    $(modal+' .modal-body').html(respond);
                    $(modal+' #PE_payment_method').materialSelect();
                    App.initCardActions();
                }, 1000);
            }
        });
    });

    // btn payment delete
    $(parent_private).on('click','#btn-delete',function(){
        id = $(this).val();
        modal = '#modalTwo';
        $(modal+' .md-overlay').show();
        $(modal+' .modal-default').removeClass('blowup out');
        $(modal+' .modal-body').html('');
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice/form_delete_payment',
            success : function(respond){
                setTimeout(function(){                   
                    $(modal+' .md-overlay').hide();
                    $(modal+' .modal-default').addClass('blowup');
                    $(modal+' .modal-body').html(respond);
                    App.initCardActions();
                }, 1000);
            }
        });
    });

    // ------------------------------------------------------------ calculation

    //price total calculation
    function calculate_price(){
        var price_Total = 0 ;  
        $(parent_private+' .price').each(function(){
            if($(this).val() != '' ) price_Total += parseFloat( $(this).val());
        });
        return price_Total;
    }

    // service price 
    $(parent_private).on('keyup','#SerFee_price',function(){
        servicefee       = $(this).val();
        count_passenger  = $(parent_private+' .price').length;
        servicefee_total = parseFloat(servicefee) * parseFloat(count_passenger);
        vat_total        = parseFloat(servicefee_total)/parseFloat(vat);
        $(parent_private+ ' #SerFee_total').val(servicefee_total.toFixed(2));
        $(parent_private+ ' #vat_total').val(vat_total.toFixed(2));

       
    });

    //vat total calcalation
    function calculate_vat(){
        Amount_Total = 0 ;  
        $(parent_private+' .vat').each(function(){
            if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
        });
        $(parent_private+' #vat_total').val( Amount_Total.toFixed(2));
    }

    //Deposit
    $(parent_private).on('keyup','#deposit_total',function(){
        deposit      = $(this).val();
        price_Total  = calculate_price(); 
        exchage_riel = $('#exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(grand_total_dollar) * parseFloat(exchage_riel);
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    //price change
    $(parent_private).on('change keyup blur','.price',function(){            
        deposit      = $(parent_private+' #deposit_total').val();
        price_Total  = calculate_price();
        exchage_riel = $(parent_private+' #exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
        
        $(parent_private+' #Amount_total').val( price_Total.toFixed(2));
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    // exchange_riel
    $(parent_private).on('change keyup blur','#exchange_riel',function(){
        exchage_riel     = $(this).val();
        price_Total      = calculate_price();
        grand_total_riel = parseFloat(price_Total) * parseFloat(exchage_riel);
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    

   
   

    

    

    


   

    



});