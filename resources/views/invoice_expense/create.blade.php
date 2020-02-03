<style>
#modalOne .modal-default{max-width: 110px!important;min-width: 60%!important;}
input.select-dropdown {
    margin: 0px!important;
    font-size: 12px!important;
    height: 32px!important;
    border: 0px solid #ddd !important;
}
.totalInput {
    font-size: 14px;
    height: 32px;
}
.deposit .caret {
    top: 10px!important;
    right: 10px!important;
}
</style>
<form method="post" action="{{ action('Invoice_expenseController@store') }}">
    @csrf 
    <div class="modal-body">
        <div class="card mb-0">
            <h5 class="text-center">Form Expense</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 pr-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Invoice Number</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                    <input type="text" class="form-control font-weight-bold totalInput border-color px-2" required id="invoice_number" name="invoice_number" autocomplete="off">    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-left font-weight-semibold  ">
                                    
                                    <p class="mt-3 mb-0"><span class="badge bg-blue-400 align-self-center">1</span> Supplier Name:  
                                        <span class="span_supplier_name">...</span>
                                    </p>
                                    <p class="m-0"><span class="badge bg-blue-400 align-self-center">2</span> Invoice Type:   
                                        <span class="span_invoice_type">...</span>
                                    </p>
                                    <p class="m-0"><span class="badge bg-blue-400 align-self-center">3</span> Invoice Amount: 
                                        <b>USD <span class="span_invoice_amount text-success">...</span></b>                                        
                                    </p>
                                    <p class="m-0"><span class="badge bg-blue-400 align-self-center">4</span> Invoice Expense:   
                                    USD<span class="span_invoice_exspense text-danger">...</span>
                                    </p>
                                    <p class="m-0"><span class="badge bg-blue-400 align-self-center">5</span> Invoice Date: 
                                        <span class="span_invoice_date">...</span>
                                    </p>
                                    <p class="mt-3 mb-0 bg-warning">
                                        <div class="toast-header border">
											<span class="messenge-alert">...</span>
										</div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6 border-left pr-1 text-left">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Expense Invoice Number</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                    <input type="text" class="form-control font-weight-bold totalInput border-color px-2" required name="expense_invoice_number" id="expense_invoice_number" autocomplete="off">    
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Payment Expense</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                    <input type="number" class="form-control font-weight-bold totalInput border-color px-2" style="background:#eee" required name="payment_expense" id="payment_expense" autocomplete="off" readonly>    
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 px-2 deposit">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Payment Expense</label>
                                <select class="mdb-select md-form m-0 w-100 payment_method border px-2" name="payment_method" id="payment_method">                                    
                                    <option value="0" selected>No Payment</option>
                                    @foreach ($payment_method as $method)
                                        <option value="{{ $method->id }}" >{{ $method->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Collect By</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                    <input type="text" class="form-control font-weight-bold totalInput border-color px-2" required name="collect_by"  id="collect_by" autocomplete="off">    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Collect Date</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                    <input type="date" class="form-control font-weight-bold totalInput border-color px-2" required name="collect_date"  id="collect_date" autocomplete="off">    
                                </div>
                            </div>
                            
                        </div>

                        
                        
                    </div>

                    <div class="col-lg-12">
                        <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Description Date</label>
                        <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                            <textarea id="form75" class="md-textarea form-control w-100" rows="5" name="description" spellcheck="false"></textarea>   
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div> 
    
    <div class="test"></div>
    <div class="modal-footer">
        <div class="form-group text-center">
            <button class="btn btn-danger legitRipple" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>    
