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

<div class="modal fade" id="HidModeSys" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
          <div class="md-form ml-0 mr-0">
            <input type="number" step="0.01" id="modalNF" class="form-control ml-0">
          </div>

          <div class="text-center mt-4">
            <button class="btn btn-cyan waves-effect waves-light" data-dismiss="modal">Save and Close
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
                <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> SUPPLIER LIST</h6>
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
                                    <div class="list-icons list-icons-extended">
                                        <a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
                                        <div class="list-icons-item dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
                                                <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
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

        
        // New Invoice List
        var loop = 2;        
        $('#modal_theme_success').on('click','.new-row',function(){
            var html = '<tr>';
                html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
                html += '<td class="position-relative text-center" id="hidMode_'+loop+'"><div class="Dtdisabled"></div><input type="hidden" name="n_p[]" id="np_'+loop+'"><span>'+loop+'</span></td>';
                html += '<td class="position-relative text-center"><div class="Dtdisabled"></div><span class="airlineCode_'+loop+'"></span><input type="hidden" name="airline_id" class="airlineId_'+loop+'"></td>';
                html += '<td><div class="d-flex"><div class="md-form m-0"><input type="text" id="AutoCompleteAirlineCode_'+loop+'" placeholder="Ticket No" name="ticket_no" class="form-control m-0"></div><i class="icon-notification2 text-warning align-self-center pl-1" id="TickAutoStatus_'+loop+'"></i></td></td>';
                html += '<td><div class="md-form m-0"><input type="text" id="guestName_'+loop+'" name="guest_name" class="form-control m-0"></div></td>';
                html += '<td><select class="mdb-select_'+loop+' md-form m-0" name="type[]"><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" value="1"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" id="amount_'+loop+'" name="amount[]" step="0.01" class="form-control m-0 text-center amount" value="0"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" id="serviceFee_'+loop+'" name="service_fee[]" step="0.01" class="form-control m-0 text-center service_fee" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="number" id="vat_'+loop+'" name="vat[]" class="form-control m-0 text-center vat" step="0.01" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="text" id="serviceFeeVat_'+loop+'" name="serviceFee_VAT" step="0.01" class="form-control m-0 text-center serviceFee_VAT" value="0"></div></td>';
                html += '<td class="position-relative"><div class="Dtdisabled"></div><div class="md-form m-0"><input type="text" id="subTotal_'+loop+'" step="0.01" class="form-control m-0 text-center sub__total" value="0"></div></td>';
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

        // AutoComplete Airline Code
        $('#modal_theme_success').on('keyup','input[id^="AutoCompleteAirlineCode_"]',function(){
            var code  = $(this).val();
            var id = $(this).attr("id").replace ( /[^\d.]/g, '' );
            
            // Clear
            $('#modal_theme_success .airlineCode_'+id).text('');
            $('#modal_theme_success .airlineId_'+id).val('');
            $('#TickAutoStatus_'+id).attr('class','icon-notification2 text-warning align-self-center pl-1');

            // ajax
            $.ajax({
                type : 'post',
                data : {code : code},
                url  : 'invoice_airticket/auto_airline',
                success : function(respond){    
                    var airline = respond.split("|");
                    $('#modal_theme_success .airlineCode_'+id).text(airline[1]);
                    $('#modal_theme_success .airlineId_'+id).val(airline[0]);
                    if(airline != ''){
                        $('#TickAutoStatus_'+id).attr('class','');
                    }                     
                }
            });
        });

        // AutoComplete Customer
        $('#modal_theme_success').on('keyup','#cusNameEn',function(){
            var name = $(this).val();

            // Clear 
            $('#modal_theme_success #customer_id').val('');
            $('#modal_theme_success #name_kh').val('');
            $('#CustomerAutoStatus').attr('class','icon-notification2 text-warning align-self-center pl-1');

            // Ajax
            $.ajax({
                type : 'post',
                data : {name : name},
                url  : 'invoice_airticket/auto_customer',
                success : function(respond){    
                    $('.AutoDisplay').html(respond);
                }
            });
        
            // Accept Customer
            $('#modal_theme_success').on('click','#acceptCustomer',function(){
                $('#modal_theme_success #customer_id').val($(this).attr('customer_id'));
                $('#modal_theme_success #name_kh').val($(this).attr('name_kh'));
                $('#modal_theme_success #cusNameEn').val($(this).text());
                $('.AutoDisplay').text('');
                $('#CustomerAutoStatus').attr('class','icon-checkmark3 text-success align-self-center pl-1');
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

        //price change
        $(document).on('change keyup blur','.price',function(){
            id_arr      = $(this).attr('id');
            id          = id_arr.split("_");
            quantity    = $('#qty_'+id[1]).val();
            price       = $('#price_'+id[1]).val();
            
            if( quantity!='' && price !='' ) $('#amount_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) ); 
            calculate_Amount();
            calculate_grand();
        });

        // Service Fee
        $(document).on('change keyup blur','.service_fee',function(){
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
            calculate_grand();
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

        //amount total calculation
        function calculate_Amount(){
            Amount_Total = 0 ;  
            $('.amount').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            $('#Amount_total').val( Amount_Total.toFixed(2));
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

        // Grand Total
        function calculate_grand(){
            deposit =  $('#deposit_total').val();
            amount = $('#Amount_total').val();
            serFee = $('#SerFee_total').val();
            vat    = $('#vat_total').val();
            grandX  = parseFloat(amount) + parseFloat(serFee) + parseFloat(vat) - parseFloat(deposit);
            $('#grand_total').val( grandX.toFixed(2));
        }

        //Deposit
        $('#modal_theme_success').on('keyup','#deposit_total',function(){
            deposit = $(this).val();

            Amount_Total = 0;
            service_fee  = 0;
            vat          = 0;      

            // Total Amount
            $('.amount').each(function(){
                if($(this).val() != '' ) Amount_Total += parseFloat( $(this).val());
            });
            // Total Service Fee
            $('.service_fee').each(function(){
                if($(this).val() != '' ) service_fee += parseFloat( $(this).val());
            });
            // Total VAT
            $('.vat').each(function(){
                if($(this).val() != '' ) vat += parseFloat( $(this).val());
            });
            total_grand = Amount_Total + service_fee + vat - deposit;
            $('#grand_total').val(total_grand.toFixed(2));
        });

        // click one-by-one
        $('.table-responsive').on('click','#btnCheck_single',function(){        
            Btndelete();
        });


    });


</script>

@stop
