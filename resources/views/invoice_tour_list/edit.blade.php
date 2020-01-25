<style>
#modalOne .modal-default{max-width: 110px!important;min-width: 90%!important;}
</style>
@foreach($invoices as $invoice)
<form method="post" action="{{ action('InvoiceController@exe_form_edit_invoice') }}">
    @csrf
    <input type="hidden" value="{{ $invoice->id }}" name="id">
    <input type="hidden" value="invoice_tour_list" name="route">

    <div class="modal-body">
        <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mr-auto p-2 col-lg-12">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-default header-elements-inline p-2">
                                        <span class="card-title font-weight-semibold font-weight-bold">Customer Info :</span>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body row p-2">
                                        
                                        <div class="col-lg-4 mb-2">
                                            <div class="col-lg-4 d-flex align-items-center ">
                                                Customer Name
                                            </div>
                                            <div class="col d-flex">
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0 w-100">
                                                    <input type="text"   value="{{ $invoice->customers->name_en }}" class="form-control dashed" placeholder="Customer Name En" id="cusNameEn" required="" autocomplete="off">
                                                    <input type="hidden" value="{{ $invoice->customer_id }}" id="customer_id" name="customer_id">
                                                    <div class="AutoDisplay_Customer"></div>
                                                </div>
                                                <i class="icon-checkmark3 text-success align-self-center" id="CustomerAutoStatus"></i>
                                            </div>                                        
                                        </div>
                                        
                                        <div class="col-lg-4 mb-2">
                                            <div class="col-lg-4 d-flex align-items-center ">
                                                Contact Person :
                                            </div>
                                            <div class="col d-flex " id="contactPerson">
                                                <select class="mdb-select md-form m-0 w-100  mdbContact" name="contact_person" id="contact_person" >                                    
                                                
                                                    @foreach($contacts as $contact)
                                                        <option value="{{ $contact->id }}" {{ ($invoice->contact_person_id == $contact->id ? 'selected':'') }}>{{ $contact->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="col-lg-4 d-flex align-items-center ">
                                                Phone :
                                            </div>
                                            <div class="col d-flex ">                                
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0 w-100">
                                                    <input type="text" value="{{ $invoice->contact_phone }}" class="form-control dashed" placeholder="Customer Phone" name="phone" id="phone" required="" autocomplete="off">
                                                    <div class="AutoDisplay"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header bg-default header-elements-inline p-2">
                                        <span class="card-title font-weight-semibold font-weight-bold">Supplier Info :</span>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="col d-flex">
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0 font-weight-bold w-100">
                                                <input type="text" value="{{ $invoice->suppliers->name_en }}" required="" class="form-control" placeholder="Supplier Name" id="supNameEn" autocomplete="off">
                                                <input type="hidden" value="{{ $invoice->supplier_id }}" id="supplier_id" name="supplier_id">
                                                <div class="AutoDisplaySup"></div>
                                            </div>
                                            <i class="icon-checkmark3 text-success align-self-center" id="SupplierAutoStatus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-3">
                            <div class="card">
								<div class="card-header bg-default header-elements-inline p-2">
									<span class="card-title font-weight-semibold font-weight-bold">System Record:</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>
								<div class="card-body p-2">
                                    

                                    <!-- Invoice Date -->
                                    <div class="row">
                                        <div class="col d-flex align-items-center">
                                            <p class="m-0"><span>Invoice Date :</span> </p>
                                        </div>
                                        <div class="col">
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                <input type="date"  value="{{ date('Y-m-d',strtotime($invoice->issue_date)) }}" class="form-control" placeholder="invoice_date" name="invoice_date" id="invoice_date" required="" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
								</div>
                            </div>                          

                           
                            
                        </div>
                        
                        
                    </div>
                    
                    <div class="my-2 d-flex">                    
                        <button type="button" class="btn btn-info btn-sm btn-rounded waves-effect waves-light new-row mr-1"><i class="icon-plus-circle2 pr-0 pt-0" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" id="delete" ><i class="icon-cancel-circle2 pr-0 pt-0" aria-hidden="true"></i></button>
                        <div class="custom-control custom-switch ml-auto d-flex align-items-end">
                            <input type="checkbox" class="custom-control-input" name="e_grouping" id="customSwitch2" {{ ($invoice->groupping == 1 ? 'checked':'') }}>
                            <label class="custom-control-label" for="customSwitch2">Grouping</label>
                        </div>
                    </div>
                    @if($invoice->status_vat == 'vat')
                    <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-2">
                                <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                    <span class="custom-control-label" for="defaultUnchecked"></span>
                                </div>
                            </td>
                            <td>No</td>                            
                            <td style="width:220px;">Full Name</td>                            
                            <td style="width: 120px;">Type</td>
                            <td>Qty</td>
                            <td>Unit Price</td>
                                                    
                        </tr>
                        @foreach($invoice->tour_list as $tour_list)
                            <tr>
                                <td class="position-relative text-center hidMode">                                    
                                    <input type="hidden" name="invoice_list_id[]" value="{{ $tour_list->id}}">
                                </td>                                
                                <td class="position-relative text-center" id="hidMode_{{ $loop->iteration }}E">
                                    <div class="Dtdisabled"></div>
                                    <input type="hidden" name="e_n_p[]" id="np_{{ $loop->iteration }}E" value="{{ $tour_list->net_price }}">
                                    <span></span>
                                </td>
                               
                                
                                <td>
                                    <div class="md-form m-0">
                                        <input type="text" value="{{ $tour_list->full_name }}" id="guestName_{{ $loop->iteration }}E" name="e_guest_name[]" class="form-control m-0">                                    
                                    </div>
                                </td>
                                <td>
                                <select class="mdb-select md-form m-0 type" name="e_type[]">   
                                    @foreach($passenger_types as $passenger_type)                            
                                        <option value="{{ $passenger_type }}" {{ ($passenger_type == $tour_list->type ? 'selected':'') }} >{{ $passenger_type }}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td class="position-relative">
                                    <div class="Tddisabled"></div>
                                    <div class="md-form m-0">
                                        <input type="number" name="e_qty[]" id="qty_{{ $loop->iteration }}E" class="form-control m-0 text-center qty" readonly value="{{ $tour_list->quantity }}">                                    
                                    </div>
                                </td>
                                <td>
                                    <div class="md-form m-0">
                                        <input type="number" name="e_price[]" id="price_{{ $loop->iteration }}E" step="0.01" class="form-control m-0 text-center price" value="{{ $tour_list->price }}">                                    
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-2" style="width:45px">
                                <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                    <span class="custom-control-label" for="defaultUnchecked"></span>
                                </div>
                            </td>
                            <td style="width:45px">No</td>
                            <td style="width:220px;">Full Name</td>
                            <td style="width:220px;">Type</td>                                                       
                            <td style="width: 120px;">Qty</td>
                            <td style="width: 120px;">Net Price</td>
                            <td style="width: 120px;">Price</td>

                                                    
                        </tr>
                        @foreach($invoice->tour_list as $tour_list)
                            <tr>
                                <td class="position-relative text-center hidMode">                                    
                                    <input type="hidden" name="invoice_list_id[]" value="{{ $tour_list->id}}">
                                </td>                                
                                <td class="position-relative text-center">
                                    <div class="Dtdisabled"></div>
                                    <span></span>
                                </td>                               
                                <td>
                                    <div class="md-form m-0">
                                        <input type="text" value="{{ $tour_list->full_name }}" id="guestName_{{ $loop->iteration }}E" name="e_full_name[]" class="form-control m-0">                                    
                                    </div>
                                </td>
                                <td>
                                <select class="mdb-select md-form m-0 type" name="e_type[]">   
                                    @foreach($passenger_types as $passenger_type)                            
                                        <option value="{{ $passenger_type }}" {{ ($passenger_type == $tour_list->type ? 'selected':'') }} >{{ $passenger_type }} {{ $tour_list->type }}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td class="position-relative">
                                    <div class="Tddisabled"></div>
                                    <div class="md-form m-0">
                                        <input type="number" name="e_qty[]" id="qty_{{ $loop->iteration }}E" class="form-control m-0 text-center qty" readonly value="{{ $tour_list->quantity }}">                                    
                                    </div>
                                </td>
                                <td>
                                    <div class="md-form m-0">
                                        <input type="text" class="form-control m-0" name="e_n_p[]" value="{{ $tour_list->net_price }}" autocomplete="off">
                                    </div>
                                </td>
                                <td>
                                    <div class="md-form m-0">
                                        <input type="number" name="e_price[]" id="price_{{ $loop->iteration }}E" step="0.01" class="form-control m-0 text-center price" value="{{ $tour_list->price }}">                                    
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
                    @endif

                    <div class="d-flex justify-content-between">
                    
                    <div class="col-lg-6 mt-3">
                        <div class="row">
                            <div class="col pl-0">
                                <label for="deposit_total" class="font-weight-bold text-dark mb-0">From Date</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="date" class="form-control font-weight-bold totalInput border-color" id="from_date" name="e_from_date" required="" value="{{ date('Y-m-d',strtotime($invoice->tour->from_date)) }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col">
                                <label for="deposit_total" class="font-weight-bold text-dark mb-0">To Date</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="date" class="form-control font-weight-bold totalInput border-color" id="to_date" name="e_to_date" value="{{ date('Y-m-d',strtotime($invoice->tour->to_date)) }}" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col">
                                <label for="deposit_total" class="font-weight-bold text-dark mb-0">Tour Code</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="text" class="form-control font-weight-bold totalInput border-color" id="tour_code" name="e_tour_code" value="{{ $invoice->tour->tour_code }}" required="" autocomplete="off">
                                </div>
                            </div>

                        

                        </div>
                        <!--Description-->
                        <div class="md-form md-outline row">
                            <textarea id="form75" class="md-textarea form-control w-100" rows="5" name="description">{{ $invoice->description}}</textarea>
                            <label for="form75">Description</label>
                        </div>
                    </div>

                    

                        
                        
                        <div class="col-lg-5 mt-3">
                            @if($invoice->status_vat == 'vat')
                            <div class="row">
                                <div class="col-lg-4 pr-1">
                                    <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Service-Fee Price</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                        <input type="number" value="{{ $invoices[0]->service_fee_price }}" step="0.01" class="form-control font-weight-bold totalInput border-color" name="servicefee_price" id="SerFee_price" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col-lg-4 pr-1">
                                    <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Service-Fee Total</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                        <input type="number" value="{{ $invoices[0]->service_fee_price*$invoice->tour_list->count('id') }}" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="servicefee_total" id="SerFee_total" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="vat_total" class="font-weight-bold text-dark mb-0">Vat Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="{{ ($invoices[0]->service_fee_price*$invoice->tour_list->count('id'))/$invoice->vat_percent }}" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="vat_total" id="vat_total" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row mt-2 pt-2 border-top">
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Deposit Total</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <?php
                                        if($invoice->invoice_incomes->isEmpty()):
                                            $deposit = 0;                                           
                                        else:
                                            $deposit = $invoice->invoice_incomes[0]->new_payment;
                                        endif; 
                                    ?>
                                        <input type="number" step="0.01" value="{{ $deposit }}" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="deposit_total" name="deposit_total" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col pr-1">
                                    <label for="Amount_total" class="font-weight-bold text-dark mb-0">Amount Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" value="{{ $invoice->total_amount }}" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="amount_total" id="Amount_total" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Exchage Riel</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" value="{{ $invoice->exchange_riel }}" class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="exchange_riel" id="exchange_riel"  required="" autocomplete="off">    
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 pt-2 border-top">
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Dollar</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="{{ $invoice->total_amount - $deposit }}" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="grand_dollar" id="grand_dollar" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Riel</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="{{ $invoice->exchange_riel*($invoice->total_amount - $deposit) }}"  step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="grand_riel" id="grand_riel" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="respond"></div>
                    
                </div>
            </div>
    </div> 

    <div class="modal-footer">
        <div class="form-group text-center">
            <button class="btn btn-danger legitRipple waves-effect waves-light modal_modal_close btn-close" type="button" data-dismiss="modal" data-modal="#modalOne">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light btn-close" >Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>
@endforeach