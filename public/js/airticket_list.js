$(document).ready(function(){
    

    // Parent ID action
    var parent = '#modal_theme_success,#modal_theme_info,#Modal_payment';

    // btn create
    $('.card').on('click','#btn-create',function(){
        parent_private = '#modal_theme_success';
    });

    // btn update
    $('.table-responsive').on('click','#btn-edit',function(){
        parent_private = '#modal_theme_info';
    });

    // btn payment
    $('.table-responsive').on('click','#btn-payment',function(){
        parent_private  = '#Modal_payment';
    });

    // hidden menu left
    $('.navbar-top').addClass('sidebar-xs');

    // Token CSRF
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    // Modal in Modal Fix overflow
    $('.modal').on('click','.modal_fix_overflow',function(){
        $('body').addClass('modal-open1');
    });

    // Modal popup in Modal
    $(parent).on('click','.modal_modal_close',function(){
        $('body').removeClass('modal-open1');
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // MD Library
    $('[data-toggle="popover"]').popover();
    $('.mdb-select').materialSelect();

    // New Invoice List
    var loop = 2;        
    $(parent).on('click','.new-row',function(){
        var html = '<tr>';
            html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
            html += '<td class="position-relative text-center" id="hidMode_'+loop+'"><div class="Dtdisabled"></div><input type="hidden" name="n_p[]" id="np_'+loop+'"><span>'+loop+'</span></td>';
            html += '<td class="text-center"> <div class="d-flex"> <div class="md-form m-0"> <input type="text" class="airlineId_'+loop+' form-control m-0" id="airlineName_'+loop+'" required placeholder="airline name"></span> <input type="hidden" name="airline_id[]" id="airlineId_'+loop+'"> <div id="autoDisplay_airlineName_'+loop+'"></div></div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconAirline_'+loop+'"></i> </div></td>';
            html += '<td> <div class="d-flex"> <div class="md-form m-0"> <input type="text" id="ticketNo_'+loop+'" name="ticket_no[]" placeholder="ticket no" required class="form-control m-0"> </div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconTicketNo_'+loop+'"></i> </div></td>';
            html += '<td><div class="md-form m-0"><input type="text" id="guestName_'+loop+'" name="guest_name[]" class="form-control m-0"></div></td>';
            html += '<td><select class="mdb-select_'+loop+' md-form m-0" name="type[]"><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td>';
            html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" value="1"></div></td>';
            html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
            html += '<td><div class="md-form m-0"><input type="number" id="serviceFee_'+loop+'" name="service_fee[]" step="0.01" class="form-control m-0 text-center service_fee" value="0"></div></td>';
            html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="number" id="vat_'+loop+'" name="vat[]" class="form-control m-0 text-center vat" step="0.01" value="0"></div></td>';
            html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="text" id="serviceFeeVat_'+loop+'" name="servicefee_vat[]" step="0.01" class="form-control m-0 text-center serviceFee_VAT" value="0"></div></td>';
        html += '</tr>';    
        $(parent_private+' .table-create').append(html);
        $(parent_private+' .mdb-select_'+loop).materialSelect();
        loop++;           
    });

    // Double Click
    $(parent).on('dblclick','td[id^="hidMode_"]',function(){           
        $('#modal_netprice').modal('show');
        Hmode = $(this).attr('id');
        id = Hmode.split("_");
        value = $(parent_private+' #np_'+id[1]).val();
        //alert(value);
        $('#modal_netprice #modalNF').val(value);
        // modalNF
        $('#modal_netprice').on('change','#modalNF',function(){                
            var Mnf = $(this).val();
            $(parent_private+' #np_'+id[1]).val(Mnf);
        });

    });

    // AutoComplete AirTicket No
    $(parent).on('keyup','input[id^="ticketNo_"]',function(){
        var name  = $(this).val();
        var Tid = $(this).attr("id").replace ( /[^\d.]/g, '' );
        
        // Clear
        $(parent_private+' #airlineName_'+Tid).val('');
        $(parent_private+' #airlineId_'+Tid).val('');
        $(parent_private+' #iconAirline_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');
        $(parent_private+' #iconTicketNo_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');

        // ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'invoice_airticket_list/auto_ticket',
            success : function(respond){    
                json  = jQuery.parseJSON(respond);
                if (json.length != 0) {
                    $(parent_private+' #airlineName_'+Tid).val(json[0].name);
                    $(parent_private+' #airlineId_'+Tid).val(json[0].id);
                    $(parent_private+' #iconTicketNo_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
                    $(parent_private+' #iconAirline_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

                }                     
            }
        });
    });

    // AutoComplete Airline name
    $(parent).on('keyup','input[id^="airlineName_"]',function(){
        var name            = $(this).val();
        var seft_airline    = $(this);
        var Aid              = $(this).attr("id").replace ( /[^\d.]/g, '' );
        json                = [];
        
        // clear data
        $(parent_private+' airlineId_'+Aid).val('');
        $(parent_private+' #iconAirline_'+Aid).attr('class','icon-notification2 text-warning align-self-center pl-1');
        
        // Ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'invoice_airticket_list/auto_airline',
            success : function(respond){  
                json  = jQuery.parseJSON(respond);
                var html = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
                if ( json.length != 0 ) {
                    $.each(json, function (i, obj) {                            
                        html += '<li class="customer list-group-item list-group-item-action" id="acceptAirtiket" airline_id="'+obj.id+'" >'+obj.name+'</li>';                         
                    });  
                }
                html += '</ul></div>';
                $(parent_private+' #autoDisplay_airlineName_'+Aid).html(html);                    
            }
        });

        // Accept Airline name
        $(parent).on('click','#acceptAirtiket',function(){
            var airline_id = $(this).attr('airline_id');
            var text = $(this).text();
            $(seft_airline).val(text);
            $(parent_private+' #airlineId_'+Aid).val(airline_id);
            $(parent_private+' #autoDisplay_airlineName_'+Aid).html('');
            $(parent_private+' #iconAirline_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
            $(parent_private+' #iconTicketNo_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

        });
    });
    // AutoComplete Customer
    $(parent).on('keyup','#cusNameEn',function(){
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
            url  : 'invoice_airticket_list/auto_customer',
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
        $(parent).on('click','#acceptCustomer',function(){
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
        $(parent).on('change','.mdbContact',function(){
            var contact = $('option:selected', this).attr('phone');
            $(parent_private+' #phone').val(contact);
        });
    
    });

    // AutoComplete Supplier
    $(parent).on('keyup','#supNameEn',function(){
        var supplier_name = $(this).val();

        // Clear 
        $(parent_private+' #supplier_id').val('');
        $(parent_private+' #SupplierAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');

        // Ajax
        $.ajax({
            type : 'post',
            data : {supplier_name : supplier_name},
            url  : 'invoice_airticket_list/auto_supplier',
            success : function(respond){    
                $(parent_private+' .AutoDisplaySup').html(respond);
            }
        });

        // Accept Supplier
        $(parent).on('click','#acceptSupplier',function(){
            $(parent_private+' #supplier_id').val($(this).attr('supplier_id'));
            $(parent_private+' #supNameEn').val($(this).text());
            $(parent_private+' .AutoDisplaySup').text('');
            $(parent_private+' #SupplierAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
        });
    });

    

    //to check all checkboxes
    // click one-by-all
    $(parent).on('click','#btnCheck_all',function(){
        $(this).toggleClass('check_false');
        check_all(parent_private);
        Btndelete();
    });
    
    //deletes the selected table rows
    $(parent).on('click','#delete',function(){
        $(parent_private+' .Bchk:checkbox:checked').parents("tr").remove();
        if($(parent_private+' #btnCheck_all').hasClass('check_false')){
            
        }else{
            $(parent_private+' #btnCheck_all input').prop('checked', false);
        }
        calculate_price();
        calculate_SerFee();
        calculate_vat();
        deposit      = $(parent_private+' #deposit_total').val();
        price_Total  = calculate_price();
        exchage_riel = $(parent_private+' #exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
        
        $(parent_private+' #Amount_total').val( price_Total.toFixed(2));
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
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

    //service Fee total calcalation
    function calculate_SerFee(){
        Amount_Total = 0 ;  
        $(parent_private+' .service_fee').each(function(){
            if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
        });
        $(parent_private+' #SerFee_total').val( Amount_Total.toFixed(2));
    }

    //vat total calcalation
    function calculate_vat(){
        Amount_Total = 0 ;  
        $(parent_private+' .vat').each(function(){
            if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
        });
        $(parent_private+' #vat_total').val( Amount_Total.toFixed(2));
    }

    //Deposit
    $(parent).on('keyup','#deposit_total',function(){
        deposit      = $(this).val();
        price_Total  = calculate_price(); 
        exchage_riel = $('#exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(grand_total_dollar) * parseFloat(exchage_riel);
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    //price change
    $(parent).on('change keyup blur','.price',function(){            
        deposit      = $(parent_private+' #deposit_total').val();
        price_Total  = calculate_price();
        exchage_riel = $(parent_private+' #exchange_riel').val();
        grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
        grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
        
        $(parent_private+' #Amount_total').val( price_Total.toFixed(2));
        $(parent_private+' #grand_dollar').val( grand_total_dollar.toFixed(2));
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    // Service Fee
    $(parent).on('change keyup blur','.service_fee',function(){
        id_arr      = $(this).attr('id');
        id          = id_arr.split("_");
        value       = $(this).val();
        
        if( value!='') 
            // VAT
            vat = parseFloat(value) * parseFloat(0.1);
            $(parent_private+' #vat_'+id[1]).val((vat).toFixed(2)); 

            // ServiceFee + VAT
            serviceFee_VAT = parseFloat(value) + parseFloat(vat);
            $(parent_private+' #serviceFeeVat_'+id[1]).val((serviceFee_VAT).toFixed(2)); 
            
            // Sub Total
            sub_Total = parseFloat($(parent_private+' #amount_'+id[1]).val()) + parseFloat(serviceFee_VAT);
            $(parent_private+' #subTotal_'+id[1]).val((sub_Total).toFixed(2));
            calculate_SerFee();
            calculate_vat();
    });

    // exchange_riel
    $(parent).on('change keyup blur','#exchange_riel',function(){
        exchage_riel     = $(this).val();
        price_Total      = calculate_price();
        grand_total_riel = parseFloat(price_Total) * parseFloat(exchage_riel);
        $(parent_private+' #grand_riel').val( grand_total_riel.toFixed(2));
    });

    // click one-by-one
    $('.table-responsive').on('click','#btnCheck_single',function(){        
        Btndelete();
    });

    // btn update
    $('.table-responsive').on('click','#btn-edit',function(){
        id      = $(this).val();
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice_airticket_list/form_edit',
            success : function(respond){
                $(parent_private+' #bodyModal').html(respond);
                $(parent_private+' #Econtact_person').materialSelect();
                $(parent_private+' #Epayment_method').materialSelect();
                $(parent_private+' .Etype').materialSelect();
                App.initCardActions();
            }
        });
    });

    // btn payment
    $('.table-responsive').on('click','#btn-payment',function(){
        id      = $(this).val();
        amount  = $(this).attr('data-amount');
        number  = $(this).attr('data-invoice-number');
        $.ajax({
            type : 'post',
            data : {id : id, amount : amount},
            url  : 'invoice_airticket_list/form_payment',
            success : function(respond){
                $(parent_private+' #bodyModal').html(respond);
                $(parent_private+' #P_paymentMethod').materialSelect();
                $(parent_private+' #P_payment_method').materialSelect();
                App.initCardActions();
                $(parent_private+' .invoice-number').text(number);
            }
        });
    });

    // btn cancel invoice
    $('.table-responsive').on('click','#btn-cancel-invoice',function(){
        id      = $(this).val();
        number  = $(this).attr('data-invoice-number');
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice_airticket_list/form_cancel_invoice',
            success : function(respond){
                $('#modal_cancel_payment .modal-content').html(respond);
            }
        });
    });

    // btn print invoice
    $('.table-responsive').on('click','#btn-print',function(){
        id      = $(this).val();
        number  = $(this).attr('data-invoice-number');
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice_airticket_list/print',
            success : function(respond){
                $('#modal_print .modal-body').html(respond);
            }
        });
    });

    // btn edit payment
    $('#Modal_payment').on('click','#btn-edit',function(){
        id = $(this).val();
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice_airticket_list/form_edit_payment',
            success : function(respond){
                $('#modal_paymentEdit .modal-body').html(respond);
                $('#modal_paymentEdit #PE_payment_method').materialSelect();
                App.initCardActions();
            }
        });
    });

    // btn delete payment history
    $('#Modal_payment').on('click','#btn-delete',function(){
        id = $(this).val();
        $.ajax({
            type : 'post',
            data : {id : id},
            url  : 'invoice_airticket_list/form_delete_payment',
            success : function(respond){
                $('#modal_paymentDelete .modal-content').html(respond);
            }
        });
    });




});