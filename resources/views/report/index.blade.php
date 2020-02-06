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
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#highlighted-tab1" class="nav-link active show" data-toggle="tab">Report Invoice</a></li>
            <li class="nav-item"><a href="#highlighted-tab2" class="nav-link" data-toggle="tab">Report Expense</a></li>
            <li class="nav-item"><a href="#highlighted-tab3" class="nav-link" data-toggle="tab">Report Income</a></li>
        </ul>

        <div class="tab-content px-0">
            <div class="tab-pane fade active show" id="highlighted-tab1">

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
                                            <div class="col-lg-12">
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
                                            
                                            <div class="col-lg-12">
                                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                                    <input type="text" class="form-control font-weight-bold text-center" id="customer_name" placeholder="Customer Name (English)" required="" autocomplete="off">
                                                </div>
                                                <div class="AutoDisplay_Customer"></div>                                       
                                            </div>

                                            <div class="col-lg-12" id="s_customer">
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
                        $invoice_head = array('n/a','airticket','visa','insurance','transportation','hotel','tour','other');
                          
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

                                // supplier
                                if($value->supplier_id == 0 ):                                    
                                    $supplier = $invoice_head[$value->service_id];
                                    $supplier = $value->$supplier->supplier_name;
                                else:
                                    $supplier = $value->suppliers->name_en;
                                endif;
                                
                                echo '<tr>';
                                    echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                                    echo '<td>'.$value->invoice_number.'</td>';
                                    echo '<td>'.$supplier.'</td>';
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
                                        <button type="button" link="invoice_'.$invoice_head[$value->service_id].'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
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

            <div class="tab-pane fade" id="highlighted-tab2">
                <div class="row">
                    <div class="col-lg-6">
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
                                                <input type="checkbox" name="invoiceService" class="custom-control-input Bchk" id="expense_{{ $service->id }}" value="{{ $service->id }}">                                    
                                                <label class="custom-control-label" for="expense_{{ $service->id }}">{{ $service->name }}</label>
                                            </div>                 
                                        </div>
                                    @endforeach                                   
                                </div> 
                                <p class="mt-2 mb-0 font-weight-bold text-info">Invoice Status</p><hr class="mt-0">
                                <div class="row">
                                    
                                    <div class="col-lg-3 my-1">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="expense_Paid" value="paid">                                    
                                            <label class="custom-control-label" for="expense_Paid">Paid</label>
                                        </div>    
                                    </div>
                                    <div class="col-lg-3 my-1">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="expense_unpaid" value="unpaid">                                    
                                            <label class="custom-control-label" for="expense_unpaid">Unpaid</label>
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
                                    <button class="btn btn-success" id="query_filter_expense">Query Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <div class="card">
                                <small class="card-header primary-color white-text text-center p-1">Filter by invoice number</small>
                            
                                <div class="card-body">
                                    <div class="row d-flex align-items-center pt-3">
                                        <div class="col-lg-12">
                                            <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                                <input type="text" class="form-control font-weight-bold text-center" id="supplier_invoice_number" placeholder="Supplier Invoice Number" required="" autocomplete="off">
                                            </div>
                                                
                                                
                                            <div class="text-center mt-2">
                                                <button class="btn btn-success waves-effect waves-light" id="query_supplier_invoice_number">Query Data</button>
                                            </div>
                                        </div>
                                        
                                    </div>                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="table">
                    <tr>
                        <td class="text-blue-800 font-weight-bold">Invoice ID</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Expense</td>
                        <td class="text-blue-800 font-weight-bold">Expense Price</td>
                        <td class="text-blue-800 font-weight-bold">Expense Date</td>
                        <td class="text-blue-800 font-weight-bold">Status Paid</td>
                        <td class="text-blue-800 font-weight-bold">Description</td>
                    </tr>
                    <tbody id="table-expense">
                    <?php
                        $invoice_list   = array('n/a','airticket_list','visa_list','insurance_list','transportation_list','hotel_list','tour_list','other_list');
                        $loop = 0;
                        // dd($invoice_expense);
                        //dd($invoice_expense[1]->expense->invoice_expense_id);
                        foreach($invoice_expense as $value):                            
                            $list                  = $invoice_list[$value->service_id];  
                            $head                  = $invoice_head[$value->service_id];
                            $total_vat             = ($value->service_fee_price*$value->$list->count('id'))/$value->vat_percent;
                            $total_expense_vat     = $value->total_amount - $value->service_fee_price - $total_vat;
                            $total_expense_no_vat  = $value->total_amount - $value->$list->sum('net_price');

           
                            if(auth()->user()->status == 'vat'): 
                                $total_expense = $total_expense_vat;
                            else:
                                $total_expense = $total_expense_no_vat;
                            endif;

                            if($value->service_id == '1'):
                                $description = '<p>Passenger Name: '.$value->contact_person_id.'</p>';
                                $description .= '<ul>';
                                foreach($value->airticket_list as $passenger):
                                    $description .= '<li>'.$passenger->passanger_name.'</li>';
                                endforeach;
                                $description .= '</ul>';                                
                            else:
                                $description = '';
                            endif;
                        
                            
                            echo '<tr>';
                            echo '<td>'.$value->invoice_number.'</td>';
                            echo '<td class="font-weight-bold">'.(!empty($value->expense->invoice_expense_id) ? $value->expense->invoice_expense_id : 'N/A' ).'</td>';
                            echo '<td>'.(empty($value->expense->invoice_expense_id) ? '--' : '<span class="text-danger font-weight-bold">USD -'.number_format($total_expense,2).'</span>').'</td>';
                            echo '<td>'.(empty($value->expense->issue_date) ? '--' : date('d/m/Y',strtotime($value->expense->issue_date))).'</td>';
                            echo '<td>'.(empty($value->expense->id) ? 'No' : 'Yes' ).'</td>';
                            echo '<td>'.$description.'</td>';
                            echo '</tr>';
                            $loop++;
                        endforeach;
                    ?>
                    </tbody>
                </table>

            </div>

            <div class="tab-pane fade" id="highlighted-tab3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" id="filter_date">
                            <small class="card-header info-color white-text text-center p-2 mb-2">
                                Filter by date
                            </small>
                            <div class="card-body" id="card-income">
                                <p class="mt-2 mb-0 font-weight-bold text-info">Invoice Type</p><hr class="mt-0">
                                <div class="row">                               
                                    @foreach($services as $service)                                        
                                        <div class="col-md-4 p-1">                                   
                                            
                                            <div class="custom-control custom-checkbox" id="btnCheck_single">
                                                <input type="checkbox" name="invoiceService" class="custom-control-input Bchk" id="income_{{ $service->id }}" value="{{ $service->id }}">                                    
                                                <label class="custom-control-label" for="income_{{ $service->id }}">{{ $service->name }}</label>
                                            </div>                 
                                        </div>
                                    @endforeach                                   
                                </div> 
                                <p class="mt-2 mb-0 font-weight-bold text-info">Invoice Status</p><hr class="mt-0">
                                <div class="row">
                                    
                                    <div class="col-lg-3 my-1">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="income_Paid" value="paid">                                    
                                            <label class="custom-control-label" for="income_Paid">Paid</label>
                                        </div>    
                                    </div>
                                    <div class="col-lg-3 my-1">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="checkbox" name="invoiceStatus" class="custom-control-input Bchk" id="income_unpaid" value="unpaid">                                    
                                            <label class="custom-control-label" for="income_unpaid">Unpaid</label>
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
                                    <button class="btn btn-success" id="query_filter_income">Query Data</button>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
               <table class="table">
                        <tr>
                            <td>Issue Date</td>
                            <td>Invoice Number</td>
                            <td>Total Amount</td>
                            <td>Total Service Fee</td>
                            <td>Total Vat</td>
                            <td>Total Income</td>
                            <td>Payment Status</td>
                            <td>View</td>
                        </tr>
                        <tbody id="table-income">
                        <?php
                            $invoice_list   = array('n/a','airticket_list','visa_list','insurance_list','transportation_list','hotel_list','tour_list','other_list');
                            foreach($invoice as $value):
                                $list               = $invoice_list[$value->service_id];
                                $list               = $value->$list->count('id');
                                if($list>0):
                                    $total_service_fee  = $value->service_fee_price * $list;
                                    $total_vat = ($total_service_fee * $list)/$value->vat_percent;
                                    echo '
                                        <tr>
                                            <td>'.$value->issue_date.'</td>
                                            <td>'.$value->invoice_number.'</td>
                                            <td>$'.number_format($value->total_amount,2).'</td>
                                            <td>$'.number_format($total_service_fee,2).'</td>
                                            <td>$'.number_format($total_vat,2).'</td>
                                            <td>$'.number_format($total_service_fee,2).'</td>';
                                            echo '<td>
                                            <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                                        <i class="icon-printer2"></i>
                                    </button></td>';
                                    echo '<tr>'; 
                                endif;
                                endforeach;
                            
                        ?>
                        </tbody>
               </table>
            </div>

        </div>
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

    $('#query_filter_income').click(function(){
        var from_date = $('#card-income #from_date').val();
        var to_date   = $('#card-income #to_date').val();		
        var array_invoiceService   = new Array();
        var array_invoiceStatus    = new Array();
       
        $('#card-income input[name="invoiceService"]:checked').each(function() {
            array_invoiceService.push(this.value);
        });

        $('#card-income input[name="invoiceStatus"]:checked').each(function() {
            array_invoiceStatus.push(this.value);
        });   

        var service         = array_invoiceService.toString();
        var status          = array_invoiceStatus.toString();
       
        $.ajax({
            type : 'post',
            data : { from_date : from_date, to_date : to_date, service : service, status : status },
            url  : 'report/auto_filter_income',
            success : function(repsond){
                $('#highlighted-tab3 #table-income').html(repsond);
            }
        });
    });

    $('#query_filter_expense').click(function(){
        var from_date = $('#highlighted-tab2 #from_date').val();
        var to_date   = $('#highlighted-tab2 #to_date').val();		
        var array_invoiceService   = new Array();
        var array_invoiceStatus    = new Array();
       
        $('#highlighted-tab2 input[name="invoiceService"]:checked').each(function() {
            array_invoiceService.push(this.value);
        });

        $('#highlighted-tab2 input[name="invoiceStatus"]:checked').each(function() {
            array_invoiceStatus.push(this.value);
        });   

        var service         = array_invoiceService.toString();
        var status          = array_invoiceStatus.toString();
       
        $.ajax({
            type : 'post',
            data : { from_date : from_date, to_date : to_date, service : service, status : status },
            url  : 'report/auto_filter_expense',
            success : function(repsond){
                $('#highlighted-tab2 #table-expense').html(repsond);
            }
        });
    });

    $('#query_invoice_number').click(function(){
        value     = $('#invoice_number').val();
        from_date = $('#s_customer #from_date').val();
        to_date   = $('#s_customer #to_date').val();
        $.ajax({
            type : 'post',
            data : { value : value, from_date : from_date, to_date : to_date },
            url  : 'report/auto_inovoice_number',
            success : function(repsond){
                $('#result').html(repsond);
            }
        });
    });

    $('#query_supplier_invoice_number').click(function(){
        value     = $('#supplier_invoice_number').val();
        $.ajax({
            type : 'post',
            data : { value : value },
            url  : 'report/auto_supplier_inovoice_number',
            success : function(repsond){
                $('#highlighted-tab2 #table-expense').html(repsond);
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
    $('#reportTable,#table-income').on('click','#btn-print',function(){
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