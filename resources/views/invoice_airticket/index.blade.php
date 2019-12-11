@extends('master')
@section('content')
<style>
table#airline td {
    padding: 5px;
}

#tbl_room td{
    padding: 2px 0px;
}
table#supplier_contact td {
    padding: 2px;
}
.modal-dialog.modal-lg{
    max-width: 1200px!important;
}
.chip{
    margin-bottom : 5px;
}
</style>

@include('modal.modal')
@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif

<div class="modal fade" id="modal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
            @include('invoice_airticket.print')
        </div>
        <div class="modal-footer">
            <div class="form-group text-center">
                <button class="btn btn-danger legitRipple waves-effect waves-light" type="button" data-dismiss="modal" id="iaSave">Cancel</button>
                <button type="button" id="print" class="btn btn-success legitRipple waves-effect waves-light">Print<i class="icon-circle-right2 ml-2"></i></button>
            </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="HidModeSys" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
          <div class="md-form ml-0 mr-0">
            <input type="number" step="0.01" id="modalNF" class="form-control ml-0">
          </div>

          <div class="text-center mt-4">
            <button class="btn btn-cyan waves-effect waves-light" id="nvSave" data-dismiss="modal">Save and Close
              <i class="fas fa-sign-in ml-1"></i>
            </button>
          </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-2">
                <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> INVOICE AIR-TICKET LIST</h6>
                <div>
                    <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="form-control-feedback">
                            <i class="icon-search4"></i>
                        </div>
                    </div>
                </div>
                <div>
                <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_success"><i class="icon-plus-circle2"></i></button>
                <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled waves-effect waves-light" id="deleteRow" data-target="#modal_theme_danger"><i class="icon-trash"></i></button>
                </div>
            </div>

            <div class="table-responsive">
            <table class="table text-nowrap">
                <tbody>
                    <tr class="table-active table-border-double">
                        <td>
                            <!-- Default unchecked -->                                
                            <div class="custom-control custom-checkbox check_false" id="btnCheck_all" >
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                <span class="custom-control-label" for="defaultUnchecked"></span>
                            </div>                            
                        </td>
                        <td class="text-blue-800 font-weight-bold">ID</td>
                        <td class="text-blue-800 font-weight-bold">ISSUED TO</td>
                        <td class="text-blue-800 font-weight-bold">STAUTS</td>
                        <td class="text-blue-800 font-weight-bold">ISSUE DATE</td>
                        <td class="text-blue-800 font-weight-bold">DUE DATE</td>
                        <td class="text-blue-800 font-weight-bold">AMOUNT</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                
                    @if(!$invoices->isEmpty())
                    
                    @else
                <tr role="row" class="odd">
                    <td>
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="4" name="checkbox">
                            <label class="custom-control-label" for="defaultUnchecked1"></label>
                        </div>
                    </td>
                    <td class="sorting_1">#0025</td>
                    
                    <td>
                        <h6 class="mb-0">
                            <a href="#">Rebecca Manes</a>
                            <span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
                        </h6>
                    </td>
                    <td>
                        <select name="status" class="form-control form-control-select2" data-placeholder="Select status">
                            <option value="overdue">Overdue</option>
                            <option value="hold" selected="">On hold</option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="invalid">Invalid</option>
                            <option value="cancel">Canceled</option>
                        </select>
                    </td>
                    <td>
                        April 18, 2015
                    </td>
                    <td>
                        <span class="badge badge-success">Paid on Mar 16, 2015</span>
                    </td>
                    <td>
                        <h6 class="mb-0 font-weight-bold">$17,890 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span></h6>
                    </td>
                    <td class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_print">View Invoice</button>
                    </td>
                </tr>
                <tr>
                    <td colspan=8 class="text-center p-5">No Data...</td>
                </tr>
            @endif 
                </tbody>
            </table>
        </div>
    
    </div>



        </div>
    </div>
    

        @if($invoices->count() > $invoices->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
                {{ $invoices->links() }}
            </div>
        @endif
       
    </div>
   
</div>
<script>
    
    $(document).ready(function(){

        // Token CSRF
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        // Modal in Modal Fix overflow
        $('#nvSave').click(function(){
            $('body').addClass('modal-open1');
        });

        // Modal popup in Modal
        $('#iaSave').click(function(){
            $('body').removeClass('modal-open1');
        });

        // New Invoice List
        var loop = 2;        
        $('#modal_theme_success').on('click','.new-row',function(){
            var html = '<tr>';
                html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
                html += '<td class="position-relative text-center" id="hidMode_'+loop+'"><div class="Dtdisabled"></div><input type="hidden" name="n_p[]" id="np_'+loop+'"><span>'+loop+'</span></td>';
                html += '<td class="text-center"> <div class="d-flex"> <div class="md-form m-0"> <input type="text" class="airlineId_'+loop+' form-control m-0" id="airlineName_'+loop+'" placeholder="airline name"></span> <input type="hidden" name="airline_id[]" id="airlineId_'+loop+'"> <div id="autoDisplay_airlineName_'+loop+'"></div></div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconAirline_'+loop+'"></i> </div></td>';
                html += '<td> <div class="d-flex"> <div class="md-form m-0"> <input type="text" id="ticketNo_'+loop+'" name="ticket_no[]" placeholder="ticket no" class="form-control m-0"> </div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconTicketNo_'+loop+'"></i> </div></td>';
                html += '<td><div class="md-form m-0"><input type="text" id="guestName_'+loop+'" name="guest_name" class="form-control m-0"></div></td>';
                html += '<td><select class="mdb-select_'+loop+' md-form m-0" name="type[]"><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" value="1"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" id="serviceFee_'+loop+'" name="service_fee[]" step="0.01" class="form-control m-0 text-center service_fee" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="number" id="vat_'+loop+'" name="vat[]" class="form-control m-0 text-center vat" step="0.01" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="text" id="serviceFeeVat_'+loop+'" name="serviceFee_VAT" step="0.01" class="form-control m-0 text-center serviceFee_VAT" value="0"></div></td>';
            html += '</tr>';    
            $('.table-create').append(html);
            $('.mdb-select_'+loop).materialSelect();
            loop++;           
        });

        // Double Click
        $('#modal_theme_success').on('dblclick','td[id^="hidMode_"]',function(){           
            $('#HidModeSys').modal('show');
            Hmode = $(this).attr('id');
            id = Hmode.split("_");
            value = $('#modal_theme_success #np_'+id[1]).val();
            $('#modalNF').val(value);
            // modalNF
            $('#HidModeSys').on('change','#modalNF',function(){                
                var Mnf = $(this).val();
                $('#modal_theme_success #np_'+id[1]).val(Mnf);
            });

        });

        // MD Library
        $('[data-toggle="popover"]').popover();
        $('.mdb-select').materialSelect();

        // AutoComplete AirTicket No
        $('#modal_theme_success').on('keyup','input[id^="ticketNo_"]',function(){
            var name  = $(this).val();
            var Tid = $(this).attr("id").replace ( /[^\d.]/g, '' );
            
            // Clear
            $('#modal_theme_success #airlineName_'+Tid).val('');
            $('#modal_theme_success #airlineId_'+Tid).val('');
            $('#modal_theme_success #iconAirline_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');
            $('#modal_theme_success #iconTicketNo_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');

            // ajax
            $.ajax({
                type : 'post',
                data : {name : name},
                url  : 'invoice_airticket/auto_ticket',
                success : function(respond){    
                    json  = jQuery.parseJSON(respond);
                    if (json.length != 0) {
                        $('#modal_theme_success #airlineName_'+Tid).val(json[0].name);
                        $('#modal_theme_success #airlineId_'+Tid).val(json[0].id);
                        $('#modal_theme_success #iconTicketNo_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
                        $('#modal_theme_success #iconAirline_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

                    }                     
                }
            });
        });

        // AutoComplete Airline name
        $('#modal_theme_success').on('keyup','input[id^="airlineName_"]',function(){
            var name            = $(this).val();
            var seft_airline    = $(this);
            var Aid              = $(this).attr("id").replace ( /[^\d.]/g, '' );
            json                = [];
            
            // clear data
            $('#modal_theme_success airlineId_'+Aid).val('');
            $('#modal_theme_success #iconAirline_'+Aid).attr('class','icon-notification2 text-warning align-self-center pl-1');
            
            // Ajax
            $.ajax({
                type : 'post',
                data : {name : name},
                url  : 'invoice_airticket/auto_airline',
                success : function(respond){  
                    json  = jQuery.parseJSON(respond);
                    var html = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
                    if ( json.length != 0 ) {
                        $.each(json, function (i, obj) {                            
                            html += '<li class="customer list-group-item list-group-item-action" id="acceptAirtiket" airline_id="'+obj.id+'" >'+obj.name+'</li>';                         
                        });  
                    }
                    html += '</ul></div>';
                    $('#autoDisplay_airlineName_'+Aid).html(html);                    
                }
            });

            // Accept Airline name
            $('#modal_theme_success').on('click','#acceptAirtiket',function(){
                var airline_id = $(this).attr('airline_id');
                var text = $(this).text();
                $(seft_airline).val(text);
                $('#modal_theme_success #airlineId_'+Aid).val(airline_id);
                $('#modal_theme_success #autoDisplay_airlineName_'+Aid).html('');
                $('#modal_theme_success #iconAirline_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

            });
        });
        // AutoComplete Customer
        $('#modal_theme_success').on('keyup','#cusNameEn',function(){
            var name = $(this).val();
            json = [];
            var z = 0;

            // Clear 
            $('#modal_theme_success #customer_id').val('');
            $('#modal_theme_success #contactPerson').val('');
            $('#CustomerAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');
            $('#contactPerson').html('');
            $('#phone').val('');

            // Ajax
            $.ajax({
                type : 'post',
                data : {name : name},
                url  : 'invoice_airticket/auto_customer',
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
                    $('.AutoDisplay_Customer').html(html);
                    
                }
            });                
            // Accept Customer
            $('#modal_theme_success').on('click','#acceptCustomer',function(){
                var customer_id = $(this).attr('customer_id');
                var phone_data = $(this).attr('phone-data');
                var opt = '<select class="mdb-select md-form m-0 w-100 dashed mdbContact">';
                $('#modal_theme_success #customer_id').val(customer_id);
                $('#modal_theme_success #cusNameEn').val($(this).text());
                $('.AutoDisplay_Customer').text('');
                $('#CustomerAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
                $.each(json[phone_data].contacts, function (i, contact) {
                    opt += '<option value="'+contact.full_name+'" phone="'+contact.phone+'">'+contact.full_name+'</option>';
                });
                opt += '</select>';
                $('#contactPerson').html(opt);
                $('.mdbContact').materialSelect();
                $('#phone').val(json[phone_data].contacts[0].phone); 
            }); 

            // selected get contact
            $('#modal_theme_success').on('change','.mdbContact',function(){
                var contact = $('option:selected', this).attr('phone');
                $('#modal_theme_success #phone').val(contact);
            });
        
        });

        // AutoComplete Supplier
        $('#modal_theme_success').on('keyup','#supNameEn',function(){
            var supplier_name = $(this).val();

            // Clear 
            $('#modal_theme_success #supplier_id').val('');
            $('#SupplierAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');

            // Ajax
            $.ajax({
                type : 'post',
                data : {supplier_name : supplier_name},
                url  : 'invoice_airticket/auto_supplier',
                success : function(respond){    
                    $('.AutoDisplaySup').html(respond);
                }
            });

            // Accept Supplier
            $('#modal_theme_success').on('click','#acceptSupplier',function(){
                $('#modal_theme_success #supplier_id').val($(this).attr('supplier_id'));
                $('#modal_theme_success #supNameEn').val($(this).text());
                $('.AutoDisplaySup').text('');
                $('#SupplierAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
            });
        });

        

        //to check all checkboxes
        // click one-by-all
        $('#modal_theme_success').on('click','#btnCheck_all',function(){
            $(this).toggleClass('check_false');
            check_all('#modal_theme_success');
            Btndelete();
        });
        
        //deletes the selected table rows
        $("#modal_theme_success").on('click','#delete',function(){
            $('#modal_theme_success .Bchk:checkbox:checked').parents("tr").remove();
            if($('#modal_theme_success #btnCheck_all').hasClass('check_false')){
                
            }else{
                $('#modal_theme_success #btnCheck_all input').prop('checked', false);
            }
            calculate_Amount();
            calculate_SerFee();
            calculate_vat();
            calculate_grand();
        });

        // ------------------------------------------------------------ calculation

        //price total calculation
        function calculate_price(){
            var price_Total = 0 ;  
            $('.price').each(function(){
                if($(this).val() != '' ) price_Total += parseFloat( $(this).val());
            });
            return price_Total;
        }

        //service Fee total calcalation
        function calculate_SerFee(){
            Amount_Total = 0 ;  
            $('.service_fee').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            $('#SerFee_total').val( Amount_Total.toFixed(2));
        }

        //vat total calcalation
        function calculate_vat(){
            Amount_Total = 0 ;  
            $('.vat').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            $('#vat_total').val( Amount_Total.toFixed(2));
        }

        //Deposit
        $('#modal_theme_success').on('keyup','#deposit_total',function(){
            deposit      = $(this).val();
            price_Total  = calculate_price(); 
            exchage_riel = $('#exchange_riel').val();
            grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
            grand_total_riel    = parseFloat(grand_total_dollar) * parseFloat(exchage_riel);
            $('#grand_dollar').val( grand_total_dollar.toFixed(2));
            $('#drand_riel').val( grand_total_riel.toFixed(2));
        });

        //price change
        $('#modal_theme_success').on('change keyup blur','.price',function(){            
            deposit      = $('#deposit_total').val();
            price_Total  = calculate_price();
            exchage_riel = $('#exchange_riel').val();
            grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
            grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
            
            $('#Amount_total').val( price_Total.toFixed(2));
            $('#grand_dollar').val( grand_total_dollar.toFixed(2));
            $('#drand_riel').val( grand_total_riel.toFixed(2));
        });

        // Service Fee
        $('#modal_theme_success').on('change keyup blur','.service_fee',function(){
            id_arr      = $(this).attr('id');
            id          = id_arr.split("_");
            value       = $(this).val();
            
            if( value!='') 
                // VAT
                vat = parseFloat(value) * parseFloat(0.1);
                $('#vat_'+id[1]).val((vat).toFixed(2)); 

                // ServiceFee + VAT
                serviceFee_VAT = parseFloat(value) + parseFloat(vat);
                $('#serviceFeeVat_'+id[1]).val((serviceFee_VAT).toFixed(2)); 
                
                // Sub Total
                sub_Total = parseFloat($('#amount_'+id[1]).val()) + parseFloat(serviceFee_VAT);
                $('#subTotal_'+id[1]).val((sub_Total).toFixed(2));
                calculate_SerFee();
                calculate_vat();
        });

        // exchange_riel
        $('#modal_theme_success').on('change keyup blur','#exchange_riel',function(){
            exchage_riel     = $(this).val();
            price_Total      = calculate_price();
            grand_total_riel = parseFloat(price_Total) * parseFloat(exchage_riel);
            $('#drand_riel').val( grand_total_riel.toFixed(2));
        });

        // click one-by-one
        $('.table-responsive').on('click','#btnCheck_single',function(){        
            Btndelete();
        });


    });


</script>

@stop
