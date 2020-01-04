<div class="card">
        <div class="card-header bg-info header-elements-inline p-2">
            <h6 class="card-title font-weight-semibold font-weight-bold">Create Payment: Current Balance $ {{ $payments_history[0]->previous_balance }}</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        
        
            <div class="card-body p-2" style="">
                <form method="post" action="{{ action('Invoice_airticket_listController@update_payment') }}">
                    @csrf
                    <input type="hidden" name="payment_list_id" value="{{ $payment_list_id }}">
                    <div class="row">
                        <div class="col">
                            <!-- Medium input -->
                            <div class="md-form text-left md-top-2">
                                <input type="number" min="1" max="{{ $payments_history[0]->previous_balance }}" id="p_paymentPrice" class="form-control font-weight-bold" name="payment_price" value="{{ $payments_history[0]->new_payment }}" step="0.01">
                                <label for="p_paymentPrice" class="text-nowrap active">Payment Price</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form text-left">
                                <input type="date" id="p_paymentDate" class="form-control font-weight-bold" name="payment_date" value="{{ date('Y-m-d',strtotime($payments_history[0]->issue_date)) }}">
                                <label for="p_paymentDate" class="text-nowrap active plabel">Payment Date</label>
                            </div>
                        </div>
                        <div class="col">
                            
                            <!--Blue select-->
                            <div class="md-form text-left">
                                <select class="mdb-select md-form colorful-select dropdown-primary" id="PE_payment_method" name="payment_method">
                                    @foreach ($payment_method as $method)
                                        <option value="{{ $method->id }}" {{ ($method->id == $payments_history[0]->payment_method_id ? 'selected':'') }}>{{ $method->name }}</option>
                                    @endforeach
                                </select>
                                <label for="P_payment_method" class="text-nowrap active plabel" style="font-size:13px">Payment Method</label>
                            </div>
                            

                        </div>
                        <div class="col">
                            <div class="md-form text-left md-top-2">
                                <input type="text" id="payment_status" class="form-control font-weight-bold" name="payment_status" value="{{ $payments_history[0]->status }}" >
                                <label for="payment_status" class="text-nowrap active">Payment Status</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="md-form text-left m-0">
                                <input type="text" id="p_paymentDescription" class="form-control font-weight-bold" name="payment_description" value="{{ $payments_history[0]->description }}" >
                                <label for="p_paymentDescription" class="text-nowrap active">Payment Description</label>
                            </div>  
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-danger legitRipple waves-effect waves-light modal_fix_overflow btn-close" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light btn-close">Save Change<i class="icon-circle-right2 ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        
        
    </div>