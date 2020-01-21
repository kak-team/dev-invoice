<style>
#modalOne .modal-default{max-width: 110px!important;min-width: 90%!important;}
.deposit input{height: 32px!important;border:0px solid #ddd !important;}
.deposit .caret{top: 10px!important;right: 10px!important}
#modalOne .table td{
    padding:10px;
}
</style>
<div class="modal-header bg-primary p-2  d-flex justify-content-center">
    <span class="modal-title text-center">NEW INVOICE</span>
</div>
<form method="post" action="{{ action('InvoiceController@exe_form_create_invoice') }}">
    @csrf
    <input type="hidden" value="{{ $company[0]->vat }}" name="vat_value">
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
                                                    <input type="text" class="form-control dashed" placeholder="Customer Name En" id="cusNameEn" required="" autocomplete="off">
                                                    <input type="hidden" id="customer_id" name="customer_id">
                                                    <div class="AutoDisplay_Customer"></div>
                                                </div>
                                                <i class="icon-notification2 text-warning align-self-center" id="CustomerAutoStatus"></i>
                                            </div>                                        
                                        </div>
                                        
                                        <div class="col-lg-4 mb-2">
                                            <div class="col-lg-4 d-flex align-items-center ">
                                                Contact Person :
                                            </div>
                                            <div class="col d-flex " id="contactPerson">
                                                <select class="mdb-select md-form m-0 w-100  mdbContact" name="contact_person" id="contact_person" >                                    
                                                    <option value="" disabled selected>No Contact</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="col-lg-4 d-flex align-items-center ">
                                                Phone :
                                            </div>
                                            <div class="col d-flex ">                                
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0 w-100">
                                                    <input type="text" class="form-control dashed" placeholder="Customer Phone" name="phone" id="phone" required="" autocomplete="off">
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
                                                <input type="text" required="" class="form-control" placeholder="Supplier Name" id="supNameEn" autocomplete="off">
                                                <input type="hidden" id="supplier_id" name="supplier_id">
                                                <div class="AutoDisplaySup"></div>
                                            </div>
                                            <i class="icon-notification2 text-warning align-self-center" id="SupplierAutoStatus"></i>
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
                                                <input type="date" class="form-control" placeholder="invoice_date" name="invoice_date" id="invoice_date" required="" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
								</div>
                            </div>                          

                           
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
								<div class="card-header bg-default header-elements-inline p-2">
									<span class="card-title font-weight-semibold font-weight-bold">Deposit & Payment Method:</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="row" style="height:38px;padding-top: 4px;">
                                        <div class="col py-0 px-2">
                                            
                                            <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                                <input type="number" step="0.01" class="form-control font-weight-bold totalInput border-color" id="deposit_total" name="deposit_total" value="0.00" required="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col px-2 deposit">
                                            <select class="mdb-select md-form m-0 w-100 payment_method border px-2" name="payment_method" id="payment_method">                                    
                                                <option value="0" selected>No Payment</option>
                                                @foreach ($payment_methods as $method)
                                                    <option value="{{ $method->id }}" >{{ $method->name }}</option>
                                                @endforeach
                                            </select>
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
                            <input type="checkbox" class="custom-control-input" name="grouping" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Grouping</label>
                        </div>
                    </div>
                @if($vat == 'vat')
                    <input type="hidden" name="status_vat" value="vat">
                    <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-2" style="width:45px;">
                                <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                    <span class="custom-control-label" for="defaultUnchecked"></span>
                                </div>
                            </td>
                            <td style="width:45px;">No</td>                            
                            <td style="width:420px;">Guest Name</td>                        
                            <td style="width:120px;">Total Adult</td>                        
                            <td style="width:120px;">Total Child</td>                        
                            <td>Qty</td>
                            <td>Unit Price</td>                            
                                                    
                        </tr>
                        <tr>
                            <td class="position-relative text-center hidMode"> 
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" class="custom-control-input Bchk" id="c_1">                                    
                                    <label class="custom-control-label" for="c_1"></label>
                                </div>
                            </td>
                            <td class="position-relative text-center" id="hidMode_1">
                                <div class="Dtdisabled"></div>
                                <input type="hidden" name="n_p[]" id="np_1">
                                <span>1</span>
                            </td>
                            
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="full_name_1" name="full_name[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="total_adult_1" name="total_adult[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="total_child_1" name="total_child[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            
                            <td class="position-relative">
                                <div class="Tddisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" name="qty[]" id="qty_1" class="form-control m-0 text-center qty" readonly value=1>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" name="price[]" id="price_1" step="0.01" class="form-control m-0 text-center price" value=0>                                    
                                </div>
                            </td>
                            
                           
                        </tr>
                    </table>
                @else
                <input type="hidden" name="status_vat" value="no_vat">
                <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-2" style="width:45px;">
                                <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                    <span class="custom-control-label" for="defaultUnchecked"></span>
                                </div>
                            </td>
                            <td style="width:45px;">No</td>
                            
                            <td style="width:220px;">Guest Name</td>  
                            <td style="width:220px;">Total Adult</td>                        
                            <td style="width:220px;">Total Child</td>                              
                            <td style="width: 120px;">Qty</td>
                            <td style="width: 120px;">Net Price</td>
                            <td style="width: 120px;">Unit Price</td>
                            
                                                    
                        </tr>
                        <tr>
                            <td class="position-relative text-center hidMode"> 
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" class="custom-control-input Bchk" id="c_1">                                    
                                    <label class="custom-control-label" for="c_1"></label>
                                </div>
                            </td>
                            <td class="position-relative text-center">
                                <div class="Dtdisabled"></div>
                                <span>1</span>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="full_name_1" name="full_name[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="total_adult_1" name="total_adult[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="total_child_1" name="total_child[]" class="form-control m-0" autocomplete="off">                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Tddisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" name="qty[]" id="qty_1" class="form-control m-0 text-center qty" readonly value=1>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" name="n_p[]" class="form-control m-0 text-center qty" id="np_1">
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" name="price[]" id="price_1" step="0.01" class="form-control m-0 text-center price" value=0>                                    
                                </div>
                            </td>
                            
                           
                        </tr>
                    </table>
                @endif
                    <div class="d-flex justify-content-between">

                        <div class="col-lg-5 mt-3">
                            <div class="col px-0">
                                <label for="deposit_total" class="font-weight-bold text-dark mb-0">Routing</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="text" class="form-control font-weight-bold totalInput border-color" id="routing" name="routing" required="" autocomplete="off">
                                </div>
                            </div>
                            
                            <!--Description-->
                            <div class="md-form md-outline">
                                <textarea id="form75" class="md-textarea form-control w-100" rows="5" name="description"></textarea>
                                <label for="form75">Description</label>
                            </div>                            
                        </div>

                        
                        
                        <div class="col-lg-5 mt-3">
                            <div class="row">
                                <div class="col-lg-4 pr-1">
                                    <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Service-Fee Price</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                        <input type="number" step="0.01" class="form-control font-weight-bold totalInput border-color" name="servicefee_price" id="SerFee_price" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col-lg-4 pr-1">
                                    <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Service-Fee Total</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="servicefee_total" id="SerFee_total" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="vat_total" class="font-weight-bold text-dark mb-0">Vat Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="vat_total" id="vat_total" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 pt-2 border-top">
                                
                                <div class="col pr-1">
                                    <label for="Amount_total" class="font-weight-bold text-dark mb-0">Amount Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="amount_total" id="Amount_total" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">KH Riel Exchange Rate</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" class=" form-control font-weight-bold totalInput border-color" name="exchange_riel" id="exchange_riel" value="{{ $company_profile[0]->exchange_kh }}" required="" autocomplete="off">    
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 pt-2 border-top">
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Dollar</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="grand_dollar" id="grand_dollar" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Riel</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" name="grand_riel" id="grand_riel" value="0.00" required="" autocomplete="off">
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
            <button class="btn btn-danger legitRipple waves-effect waves-light modal_modal_close btn-close" type="button" data-modal="#modalOne">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light btn-close">Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>