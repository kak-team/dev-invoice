<style>
#modalOne .modal-default{
    max-width: 110px!important;
    min-width: 70%!important;
}
#tbl_paymentHistory td{
    height: 40px;
}
#tbl_paymentHistory th{
    font-weight:400;
    font-size:12px;
}
.plabel{
    top: 18px!important;
    z-index: 1!important;
}
.md-top-2{
    top:2px;
}
.Prow{
    box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
    border: 1px solid #ddd;
}
</style>
@php
    $balance_owed = $amount - $payments_history->sum('new_payment');
    $current = 0;
@endphp
<h4 class="font-weight-bold text-uppercase mb-0 mt-3">Payment Invoice</h4>
<span>Invoice Number: </span> <span class="invoice-number"></span>
<div class="px-3">
    @if( $balance_owed > 0)
    <div class="card mb-5">
        <div class="card-header bg-info header-elements-inline p-2">
            <h6 class="card-title font-weight-semibold font-weight-bold">Create Payment: Balance Owed $ 
                {{ $balance_owed }}
            </h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        
        
        <div class="card-body p-2" style="">
                <form method="post" action="{{ action('InvoiceController@exe_form_create_payment') }}">
                    @csrf
                    <input type="hidden" name="invoice_id" value="{{ $id }}">
                    <div class="row">
                        <div class="col">
                            <!-- Medium input -->
                            <div class="md-form text-left md-top-2">
                                <input type="number" min="1" max="{{ $balance_owed }}" id="p_paymentPrice" class="form-control font-weight-bold" name="payment_price" value="0.00" step="0.01">
                                <label for="p_paymentPrice" class="text-nowrap active">Payment Price</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form text-left">
                                <input type="date" id="p_paymentDate" class="form-control font-weight-bold" name="payment_date" value="<?php echo date('Y-m-d'); ?>">
                                <label for="p_paymentDate" class="text-nowrap active plabel">Payment Date</label>
                            </div>
                        </div>
                        <div class="col">
                            
                            <!--Blue select-->
                            <div class="md-form text-left">
                                <select class="mdb-select md-form colorful-select dropdown-primary" id="P_payment_method" name="payment_method">
                                    @foreach ($payment_method as $method)
                                        <option value="{{ $method->id }}" >{{ $method->name }}</option>
                                    @endforeach
                                </select>
                                <label for="P_payment_method" class="text-nowrap active plabel" style="font-size:13px">Payment Method</label>
                            </div>
                            

                        </div>
                        <div class="col">
                            <div class="md-form text-left md-top-2">
                                <input type="text" id="payment_status" class="form-control font-weight-bold" name="payment_status" value="pay off" >
                                <label for="payment_status" class="text-nowrap active">Payment Status</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="md-form text-left m-0">
                                <input type="text" id="p_paymentDescription" class="form-control font-weight-bold" name="payment_description" value=" " >
                                <label for="p_paymentDescription" class="text-nowrap active">Payment Description</label>
                            </div>  
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light">Save Change<i class="icon-circle-right2 ml-2"></i></button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    @else
        <div class="alert alert-primary border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <span class="font-weight-semibold">Completed!</span> This invoice has been paid successfully.
        </div>
    @endif

    
    
    <h6 class="text-left col-lg-12 font-weight-bold pl-0">Paymenet History</h6>
        <table class="table border table-create table-bordered table-striped table-hover" id="tbl_paymentHistory">
            <tr class="table-active table-border-double text-center">
                <td>No</td>
                <th>Previous Balnace</th>
                <th>Repay</th>
                <th>Balance Owed</th>
                <th>Repay Date</th>
                <th> Method</th>
                <th> Status</th>
                <th> Description</th>
                <th>Setting</th>
            </tr>
            @if(!$payments_history->isEmpty())
                @foreach($payments_history as $history)
                
                <tr class="font-weight-bold">
                    <td>{{ $loop->iteration}}</td>
                    @if($loop->iteration == 1)
                        @php $current = $amount - $history->new_payment @endphp
                        <td>$ {{ number_format($amount,2) }}</td>
                        <td>$ {{ number_format($history->new_payment,2) }}</td>
                        <td>$ {{ number_format($amount - $history->new_payment,2) }}</td>
                    @else
                        <td>$ {{ number_format($current,2) }}</td>
                        <td>$ {{ number_format($history->new_payment,2) }}</td>
                        <td>$ {{ number_format($current - $history->new_payment,2) }}</td>
                        @php $current = $current - $history->new_payment @endphp
                    @endif
                    
                    <td>{{ date('d M Y',strtotime($history->issue_date)) }}</td>
                    <td>{{ $history->payment_method[0]->name }}</td>
                    <td>{{ $history->status }}</td>
                    <td>{{ $history->description }}</td>
                    <td>
                        @if(count($payments_history) == $loop->iteration)
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Edit Invoice">
                                <button type="button" class="btn btn-sm btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light modal2" data-toggle="modal" data-target="#modalTwo" id="btn-edit" value="{{ $history->id }}">
                                    <i class="icon-quill4"></i>
                                </button>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="Edit Invoice">
                                <button type="button" class="btn btn-sm btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalTwo" id="btn-delete" value="{{ $history->id }}">
                                    <i class="icon-trash"></i>
                                </button>
                            </span>
                        @else
                        
                        @endif
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan=11 class="p-3">No Payment Record...</td>
                </tr>
            @endif
        </table>


    <div class="pt-5 pr-0 text-center">
            <div class="form-group text-center">
                <button class="btn btn-danger legitRipple waves-effect waves-light modal_modal_close btn-close" type="button" data-dismiss="modal" data-modal="#modalOne">Close</button>
            </div>
        </div>
</div>