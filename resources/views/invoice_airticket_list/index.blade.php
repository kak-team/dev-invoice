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
<style>
    table.table-create td{
        padding: 0px 12px;
    }
    input.select-dropdown{
        margin: 0px!important;
        font-size: 12px!important;
        
    }
    table.table-create input{
        padding: 0px!important;
        border:0px !important;  
    }
    table.table-create tr.table-active td{
        white-space: nowrap;
    }
    .position-relative{
        background: #f7f7f7;
    }
    .Tddisabled{
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 1;

    }
    input[type='number'] {
    -moz-appearance:textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    .custom-control-label::before,.custom-control-label::after{
        left : -25px;
    }

    .mdb-autocomplete-wrap{
        white-space: nowrap;
        min-width: 315px;
    }

    .form-group-feedback-left .form-control{
        padding-left: 5px;
    }
    .list-group{
        padding:0px;
        border:0px;
    }
    body.modal-open{
        overflow:hidden;
    }
    .modal-open1 .modal {
        overflow-x: hidden;
        overflow-y: auto;
    }
    body.navbar-top.modal-open1 {
        overflow: hidden;
    }
    .border-color{
        border-color: #009688;
    }
    .totalInput {
        font-size: 14px;
        height: 32px;
    }
    .text-dark {
        color: #526973!important;
        text-transform: uppercase;
        font-size: 11px;
    }
    .bgwhiteblue{
        background: #e9f8fd!important;
    }
</style>


@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif

<div class="modal fade" id="modal_theme_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content" id="bodyModal">
        <!--Body-->         
        @include('invoice_airticket_list.create')
        
      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="modal_theme_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content" id="bodyModal">

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="modal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
            @include('invoice_airticket_list.print')
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
                <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_success" id="btn-create"><i class="icon-plus-circle2"></i></button>
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
                        <td class="text-blue-800 font-weight-bold">INVOICE No</td>
                        <td class="text-blue-800 font-weight-bold">CUSTOMERS</td>
                        <td class="text-blue-800 font-weight-bold">ISSUE DATE</td>
                        <td class="text-blue-800 font-weight-bold">TOTAL AMOUNT</td>
                        <td class="text-blue-800 font-weight-bold">PAYMENT STAUTS</td>
                        <td class="text-blue-800 font-weight-bold">INVOICE STAUTS</td>

                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                
                @if(!$invoices->isEmpty())
                @foreach($invoices as $value)

                <tr role="row" class="odd">
                    <td>
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="4" name="checkbox">
                            <label class="custom-control-label" for="defaultUnchecked1"></label>
                        </div>
                    </td>
                    <td class="sorting_1">{{ $value->invoice_number }}</td>
                    
                    <td>
                        <h6 class="mb-0">
                            <a href="#">{{ $value->customers->name_en }}</a>
                            <span class="d-block font-size-sm text-muted">{{ $value->customers->full_name.'/ Tel: '. $value->contact_phone }}</span>
                        </h6>
                    </td>
                    
                    <td>
                        {{ date('d M Y',strtotime($value->issue_date)) }}
                    </td>
                     
                    <td>
                        <h6 class="mb-0 font-weight-bold">$ {{ number_format($value->total_amount,2) }} </h6>
                    </td>
                    
                    <td class="text-center">
                        <span class="badge badge-success">{{ $value->status_payment }}</span>
                    </td>

                    <td class="text-center">
                        <span class="badge badge-danger">{{ $value->status_invoice }}</span>
                    </td>
                    <td class="text-center">
                    <button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="{{ $value->id }}" ><i class="icon-quill4"></i></button>
                    <button type="button" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit"><i class="icon-printer2"></i></button>  
                    <button type="button" class="btn btn-outline bg-orange-400 border-orange-400 text-orange-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit"><i class="icon-notification2"></i></button>  
                    </td>
                </tr>
                @endforeach

                @else
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

        // Parent ID action
        var parent = '#modal_theme_success';
        
        // btn create
        $('#btn-create').click(function(){
            parent = '#modal_theme_success';
        });

        

        // hidden menu left
        $('.navbar-top').addClass('sidebar-xs');

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
            $('.table-create').append(html);
            $('.mdb-select_'+loop).materialSelect();
            loop++;           
        });

        // Double Click
        $(parent).on('dblclick','td[id^="hidMode_"]',function(){           
            $('#HidModeSys').modal('show');
            Hmode = $(this).attr('id');
            id = Hmode.split("_");
            value = $(parent+' #np_'+id[1]).val();
            $('#modalNF').val(value);
            // modalNF
            $('#HidModeSys').on('change','#modalNF',function(){                
                var Mnf = $(this).val();
                $(parent+' #np_'+id[1]).val(Mnf);
            });

        });

        // MD Library
        $('[data-toggle="popover"]').popover();
        $('.mdb-select').materialSelect();

        // AutoComplete AirTicket No
        $(parent).on('keyup','input[id^="ticketNo_"]',function(){
            var name  = $(this).val();
            var Tid = $(this).attr("id").replace ( /[^\d.]/g, '' );
            
            // Clear
            $(parent+' #airlineName_'+Tid).val('');
            $(parent+' #airlineId_'+Tid).val('');
            $(parent+' #iconAirline_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');
            $(parent+' #iconTicketNo_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');

            // ajax
            $.ajax({
                type : 'post',
                data : {name : name},
                url  : 'invoice_airticket_list/auto_ticket',
                success : function(respond){    
                    json  = jQuery.parseJSON(respond);
                    if (json.length != 0) {
                        $(parent+' #airlineName_'+Tid).val(json[0].name);
                        $(parent+' #airlineId_'+Tid).val(json[0].id);
                        $(parent+' #iconTicketNo_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
                        $(parent+' #iconAirline_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

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
            $(parent+' airlineId_'+Aid).val('');
            $(parent+' #iconAirline_'+Aid).attr('class','icon-notification2 text-warning align-self-center pl-1');
            
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
                    $(parent+' #autoDisplay_airlineName_'+Aid).html(html);                    
                }
            });

            // Accept Airline name
            $(parent).on('click','#acceptAirtiket',function(){
                var airline_id = $(this).attr('airline_id');
                var text = $(this).text();
                $(seft_airline).val(text);
                $(parent+' #airlineId_'+Aid).val(airline_id);
                $(parent+' #autoDisplay_airlineName_'+Aid).html('');
                $(parent+' #iconAirline_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
                $(parent+' #iconTicketNo_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

            });
        });
        // AutoComplete Customer
        $(parent).on('keyup','#cusNameEn',function(){
            var name = $(this).val();
            json = [];
            var z = 0;

            // Clear 
            $(parent+' #customer_id').val('');
            $(parent+' #contactPerson').val('');
            $(parent+' #CustomerAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');
            $(parent+' #contactPerson').html('');
            $(parent+' #phone').val('');

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
                    $(parent+' .AutoDisplay_Customer').html(html);
                    
                }
            });                
            // Accept Customer
            $(parent).on('click','#acceptCustomer',function(){
                var customer_id = $(this).attr('customer_id');
                var phone_data = $(this).attr('phone-data');
                var opt = '<select class="mdb-select md-form m-0 w-100 dashed mdbContact" name="contact_person">';
                $(parent+' #customer_id').val(customer_id);
                $(parent+' #cusNameEn').val($(this).text());
                $(parent+' .AutoDisplay_Customer').text('');
                $(parent+' #CustomerAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
                $.each(json[phone_data].contacts, function (i, contact) {
                    opt += '<option value="'+contact.id+'" phone="'+contact.phone+'">'+contact.full_name+'</option>';
                });
                opt += '</select>';
                $(parent+' #contactPerson').html(opt);
                $(parent+' .mdbContact').materialSelect();
                $(parent+' #phone').val(json[phone_data].contacts[0].phone); 
            }); 

            // selected get contact
            $(parent).on('change','.mdbContact',function(){
                var contact = $('option:selected', this).attr('phone');
                $(parent+' #phone').val(contact);
            });
        
        });

        // AutoComplete Supplier
        $(parent).on('keyup','#supNameEn',function(){
            var supplier_name = $(this).val();

            // Clear 
            $(parent+' #supplier_id').val('');
            $(parent+' #SupplierAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');

            // Ajax
            $.ajax({
                type : 'post',
                data : {supplier_name : supplier_name},
                url  : 'invoice_airticket_list/auto_supplier',
                success : function(respond){    
                    $(parent+' .AutoDisplaySup').html(respond);
                }
            });

            // Accept Supplier
            $(parent).on('click','#acceptSupplier',function(){
                $(parent+' #supplier_id').val($(this).attr('supplier_id'));
                $(parent+' #supNameEn').val($(this).text());
                $(parent+' .AutoDisplaySup').text('');
                $(parent+' #SupplierAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
            });
        });

        

        //to check all checkboxes
        // click one-by-all
        $(parent).on('click','#btnCheck_all',function(){
            $(this).toggleClass('check_false');
            check_all(parent);
            Btndelete();
        });
        
        //deletes the selected table rows
        $(parent).on('click','#delete',function(){
            $(parent+' .Bchk:checkbox:checked').parents("tr").remove();
            if($(parent+' #btnCheck_all').hasClass('check_false')){
                
            }else{
                $(parent+' #btnCheck_all input').prop('checked', false);
            }
            calculate_price();
            calculate_SerFee();
            calculate_vat();
            deposit      = $(parent+' #deposit_total').val();
            price_Total  = calculate_price();
            exchage_riel = $(parent+' #exchange_riel').val();
            grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
            grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
            
            $(parent+' #Amount_total').val( price_Total.toFixed(2));
            $(parent+' #grand_dollar').val( grand_total_dollar.toFixed(2));
            $(parent+' #grand_riel').val( grand_total_riel.toFixed(2));
        });

        // ------------------------------------------------------------ calculation

        //price total calculation
        function calculate_price(){
            var price_Total = 0 ;  
            $(parent+' .price').each(function(){
                if($(this).val() != '' ) price_Total += parseFloat( $(this).val());
            });
            return price_Total;
        }

        //service Fee total calcalation
        function calculate_SerFee(){
            Amount_Total = 0 ;  
            $(parent+' .service_fee').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            $(parent+' #SerFee_total').val( Amount_Total.toFixed(2));
        }

        //vat total calcalation
        function calculate_vat(){
            Amount_Total = 0 ;  
            $(parent+' .vat').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            $(parent+' #vat_total').val( Amount_Total.toFixed(2));
        }

        //Deposit
        $(parent).on('keyup','#deposit_total',function(){
            deposit      = $(this).val();
            price_Total  = calculate_price(); 
            exchage_riel = $('#exchange_riel').val();
            grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
            grand_total_riel    = parseFloat(grand_total_dollar) * parseFloat(exchage_riel);
            $(parent+' #grand_dollar').val( grand_total_dollar.toFixed(2));
            $(parent+' #grand_riel').val( grand_total_riel.toFixed(2));
        });

        //price change
        $(parent).on('change keyup blur','.price',function(){            
            deposit      = $(parent+' #deposit_total').val();
            price_Total  = calculate_price();
            exchage_riel = $(parent+' #exchange_riel').val();
            grand_total_dollar  = parseFloat(price_Total) - parseFloat(deposit);
            grand_total_riel    = parseFloat(price_Total) * parseFloat(exchage_riel);
            
            $(parent+' #Amount_total').val( price_Total.toFixed(2));
            $(parent+' #grand_dollar').val( grand_total_dollar.toFixed(2));
            $(parent+' #grand_riel').val( grand_total_riel.toFixed(2));
        });

        // Service Fee
        $(parent).on('change keyup blur','.service_fee',function(){
            id_arr      = $(this).attr('id');
            id          = id_arr.split("_");
            value       = $(this).val();
            
            if( value!='') 
                // VAT
                vat = parseFloat(value) * parseFloat(0.1);
                $(parent+' #vat_'+id[1]).val((vat).toFixed(2)); 

                // ServiceFee + VAT
                serviceFee_VAT = parseFloat(value) + parseFloat(vat);
                $(parent+' #serviceFeeVat_'+id[1]).val((serviceFee_VAT).toFixed(2)); 
                
                // Sub Total
                sub_Total = parseFloat($(parent+' #amount_'+id[1]).val()) + parseFloat(serviceFee_VAT);
                $(parent+' #subTotal_'+id[1]).val((sub_Total).toFixed(2));
                calculate_SerFee();
                calculate_vat();
        });

        // exchange_riel
        $(parent).on('change keyup blur','#exchange_riel',function(){
            exchage_riel     = $(this).val();
            price_Total      = calculate_price();
            grand_total_riel = parseFloat(price_Total) * parseFloat(exchage_riel);
            $(parent+' #grand_riel').val( grand_total_riel.toFixed(2));
        });

        // click one-by-one
        $('.table-responsive').on('click','#btnCheck_single',function(){        
            Btndelete();
        });

        // btn update
        $('.table-responsive').on('click','#btn-edit',function(){
            parent  = '#modal_theme_info';
            id      = $(this).val();
            $.ajax({
                type : 'post',
                data : {id : id},
                url  : 'invoice_airticket_list/form_edit',
                success : function(respond){
                    $(parent+' #bodyModal').html(respond);
                    $(parent+' #Econtact_person').materialSelect();
                }
            });
        });


    });


</script>

@stop
