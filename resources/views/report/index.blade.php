@extends('master')
@section('content')

<style>

.white-skin input[type=checkbox]:checked+label:before{
    border-right: 0px solid #4285f4;
    border-bottom: 0px solid #4285f4;
}
</style>
<style media="print">
    .side-bar, .navbar, .page-header, 
    .card, .top-print, .modal-footer{
        display:none
    }
    .modal-dialog.cascading-modal.modal-avatar.modal-lg{
        margin:0!important;
    }
    .print-wrap,.modal-body{
        padding:0px!important;
    }
    .print-footer{
        display:flex;
        align-items:flex-end;
    }
</style>

<style media="print">
.modal-footer,.z-depth-1{
    display:none;
}
</style>
<script type="text/javascript" src="{{ URL::asset('js/Print-Excel/libs/FileSaver/FileSaver.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/Print-Excel/tableExport.js') }}"></script>

<script type="text/javaScript">
    $(document).ready(function(){
      $('#btnExcel').click(function(){
            $('#reportTable').tableExport({
                type:'excel',
                mso: {
                styles: ['background-color',
                        'color',
                        'font-family',
                        'font-size',
                        'font-weight',
                        'text-align']
                }
            }
            );
        });
    });
    </script>
<div class="modal fade" id="modalOne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-default blowup" style="width: 190px;" role="document">
        <div class="modal-content modal-background bg-white">
            <div class="md-overlay">
                <div class="text-center d-flex justify-content-center">
                    <img src="{{ URL::asset('images/loading.gif') }}">
                </div>
            </div>
            <div class="modal-body text-center p-0">         
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal_in_modal" id="modalTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-dialog-centered modal-default blowup" style="min-width: 190px;max-width: 190px;" role="document">
      <div class="modal-content modal-background bg-white">
        <div class="md-overlay">
            <div class="text-center d-flex justify-content-center">
                <img src="{{ URL::asset('images/loading.gif') }}">
            </div>
        </div>
        <div class="modal-body text-center p-0">         
            
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="card" id="filter_date">
                    <small class="card-header info-color white-text text-center p-2 mb-2">
                        Filter by date
                    </small>
                    <div class="card-body">
                        <p class="mt-2 mb-0 font-weight-bold text-info">Invoice Type</p><hr class="mt-0">
                        <div class="row">                               
                            @foreach($services as $service)                                        
                                <div class="col-md-4 p-1">                                   
                                    
                                    <div class="custom-control custom-checkbox" id="btnCheck_single">
                                        <input type="checkbox" name="invoiceService" class="custom-control-input Bchk" id="c_{{ $service->id }}" value="{{ $service->id }}">                                    
                                        <label class="custom-control-label" for="c_{{ $service->id }}">{{ $service->name }}</label>
                                    </div>                 
                                </div>
                            @endforeach                                   
                        </div> 
                        <p class="mt-2 mb-0 font-weight-bold text-info">Invoice Status</p><hr class="mt-0">
                        <div class="row">
                            
                            <div class="col-lg-3 my-1">
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="d_Paid" value="paid">                                    
                                    <label class="custom-control-label" for="d_Paid">Paid</label>
                                </div>    
                            </div>
                            <div class="col-lg-3 my-1">
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="d_unpaid" value="unpaid">                                    
                                    <label class="custom-control-label" for="d_unpaid">Unpaid</label>
                                </div>    
                            </div>

                            <div class="col-lg-3 my-1 ">
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" name="invoiceStatusCancel" class="custom-control-input Bchk" id="d_cancel" value="cancel">                                    
                                    <label class="custom-control-label text-nowrap" for="d_cancel"> Cancel Invoice</label>
                                </div>    
                            </div>
                            
                        </div>

                        <p class="mt-2 mb-0 font-weight-bold text-info">Date Range</p><hr class="mt-0">
                        <div class="row mt-2">
                            <div class="col">
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="date" class="form-control font-weight-bold totalInput border-color" id="from_date"  value="{{ date('Y-m-d') }}" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col">
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="date" class="form-control font-weight-bold totalInput border-color" id="to_date"  value="{{ date('Y-m-d') }}" required="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-success" id="query_filter">Query Data</button>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col">            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <small class="card-header primary-color white-text text-center p-1">Filter by invoice number</small>
                        
                            <div class="card-body">
                                <div class="row d-flex align-items-center pt-3">
                                    <div class="col">
                                        <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                            <input type="text" class="form-control font-weight-bold text-center" id="invoice_number" placeholder="Invoice Number" required="" autocomplete="off">
                                        </div>
                                        <div class="text-center mt-2">
                                            <button class="btn btn-success waves-effect waves-light" id="query_invoice_number">Query Data</button>
                                        </div>
                                    </div>
                                    
                                </div>                     
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <small class="card-header primary-color white-text text-center p-1">Filter by Customer</small>                        
                            <div class="card-body">
                                <div class="row d-flex align-items-center pt-3">
                                    
                                    <div class="col">
                                        <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                            <input type="text" class="form-control font-weight-bold text-center" id="customer_name" placeholder="Customer Name (English)" required="" autocomplete="off">
                                        </div>
                                        <div class="AutoDisplay_Customer"></div>                                       
                                    </div>
                                    
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-success waves-effect waves-light" id="query_customer">Query Data</button>
                                </div>                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div></div>
            <div><h1>Report</h1></div>            
            <div class="btn-group mb-2">
                <button type="button" class="btn legitRipple mr-2" id="btnExcel">
                    <i class="icon-printer"></i>
                    <span class="d-none d-lg-inline-block ml-2">Export-Excel</span>
                </button>
                <button type="button" class="btn legitRipple waves-effect waves-light">
                    <i class="icon-new-tab2"></i>
                    <span class="d-none d-lg-inline-block ml-2">Print Now</span>
                </button>
            </div>
        </div>
        <table class="table table-striped border" id="reportTable">
            <thead class="bg-info">
                <tr>
                    <th style="background-color:#00bcd4" class="text-nowrap small">Issued Date</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Invoice Number</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Provider Name</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Service Type</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Company Name</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Total</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Sale By</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Payment Status</th>
                    <th style="background-color:#00bcd4" class="text-center text-nowrap small">Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody id="result">
            <?php 
               
                if (!empty($invoice[0]->id)):
                    foreach($invoice as $value){
                        $amount         = $value->total_amount;
                        $total_payment  = $value->invoice_incomes->sum('new_payment');
            
                        // Compare invoice status ( Paid & Unpaid )
                        if($total_payment == $value->total_amount):
                            $invoice_income_status = 'paid';
                        else:
                            $invoice_income_status = 'unpaid';                
                        endif;
                        
                        echo '<tr>';
                            echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                            echo '<td>'.$value->invoice_number.'</td>';
                            echo '<td>'.$value->suppliers->name_en.'</td>';
                            echo '<td>'.$value->service_type[0]->name.'</td>';
                            echo '<td>'.$value->customers->name_en.'</td>';
                            echo '<td>$'.$amount.'.00</td>';
                            echo '<td>'.$value->issue_by->name.'</td>';
                            echo '<td>';
                                if($invoice_income_status == 'paid'):
                                    echo  '<button class="btn bg-success legitRipple btn-sm badge">PAID</button>';
                                else:
                                    echo '<button class="btn bg-orange legitRipple btn-sm badge">UNPAID</button>';
                                endif;
                            echo '</td>';
                            echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                            echo '<td>
                                <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                            <i class="icon-printer2"></i>
                        </button></td>';
                        echo '</tr>';           
                    }
                else:
                    echo '<tr>
                            <td colspan="10" class="text-center">Recent Invoice...</td>
                        </tr>';
                endif;
            ?>
            </tbody>
        </table>
    </div>
</div>

        
 


<script>
  // Get the elements
$(document).ready(function(){
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
    

    $('#query_filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();		
        var array_invoiceService   = new Array();
        var array_invoiceStatus    = new Array();
        var array_invoiceStatusCancel    = new Array();

        $('#filter_date input[name="invoiceService"]:checked').each(function() {
            array_invoiceService.push(this.value);
        });

        $('#filter_date input[name="invoiceStatus"]:checked').each(function() {
            array_invoiceStatus.push(this.value);
        });   

        $('#filter_date input[name="invoiceStatusCancel"]:checked').each(function() {
            array_invoiceStatusCancel.push(this.value);
        });

        var service         = array_invoiceService.toString();
        var status          = array_invoiceStatus.toString();
        var statuscancel    = array_invoiceStatusCancel.toString();
        $.ajax({
            type : 'post',
            data : { from_date : from_date, to_date : to_date, service : service, status : status, statuscancel : statuscancel },
            url  : 'report/auto_filter',
            success : function(repsond){
                $('#result').html(repsond);
            }
        });
    });

    $('#query_invoice_number').click(function(){
        var value = $('#invoice_number').val();
        $.ajax({
            type : 'post',
            data : { value : value },
            url  : 'report/auto_inovoice_number',
            success : function(repsond){
                $('#result').html(repsond);
            }
        });
    });
    $('#customer_name').keyup(function(){
        var name = $(this).val();
        json = [];
        var z = 0;

        // Ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'report/auto_customer',
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
        $('.AutoDisplay_Customer').on('click','#acceptCustomer',function(){
            var customer_id = $(this).attr('customer_id');

            $.ajax({
                type : 'post',
                data : { customer_id : customer_id },
                url  : 'report/auto_inovoice_by_cusomter',
                success : function(repsond){
                    $('#result').html(repsond);
                }
            });
            $('#customer_name').val($(this).text());
            $('.AutoDisplay_Customer').text('');

        }); 
    });

    // btn print invoice
    $('#reportTable').on('click','#btn-print',function(){
        id      = $(this).val();
        number  = $(this).attr('data-invoice-number');
        link    = $(this).attr('link');

        $(parent_private+' .md-overlay').show();
        $(parent_private+' .modal-default').removeClass('blowup out');
        $(parent_private+' .modal-body').html('');

        $.ajax({
            type : 'post',
            data : {id : id, link : link},
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
});
</script>


@stop 