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
   
</style>
<form method="post" >
    <div class="modal-body">
        <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h5 class="mb-0 font-weight-bold text-success">វិក្កយបត្រ អតប</h5>
                        <span class="d-block text-muted">TAX INVOICE</span>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="mr-auto p-2 col-lg-6">
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center ">
                                   <b> អតិថិជន/Customer : </b>
                                </div>
                                
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 d-flex align-items-center ">
                                    ឈ្មោះក្រុមហ៊ុន ឬអតិថិជន
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" placeholder="name_kh" id="name_kh" readonly required="" autocomplete="off">
                                        <input type="hidden" id="customer_id" name="customer_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4 d-flex align-items-center ">
                                     Company name / Customer
                                </div>
                                <div class="col d-flex">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" placeholder="Customer Name En" id="cusNameEn" required="" autocomplete="off">
                                        <div class="AutoDisplay"></div>
                                    </div>
                                    <i class="icon-notification2 text-warning align-self-center" id="CustomerAutoStatus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <!-- Invoice ID -->
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p>លេខរៀងវិក្កយបត្រ<br> <span>Invoice No :</span> </p>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" disabled value="Draf Number" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice ID -->
                            <div class="row mt-3">
                                <div class="col d-flex align-items-center">
                                    <p>កាលបរិច្ឆេទ<br> <span>Date :</span> </p>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="date" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-2">
                                <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                    <span class="custom-control-label" for="defaultUnchecked"></span>
                                </div>
                            </td>
                            <td>No</td>
                            <td>Airline</td>
                            <td style="width:120px;">Ticket No</td>
                            <td style="width: 170px;">Guest Name</td>                            
                            <td style="width: 120px;">Type</td>
                            <td>Qty</td>
                            <td>Sell Price</td>
                            <td>Amount</td>
                            <td>Service Fee</td>
                            <td>VAT</td>
                            <td>Service Fee + VAT</td>
                            <td>Sub Total</td>                            
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
                            <td class="position-relative text-center">
                                <div class="Dtdisabled"></div>
                                <span class="airlineCode_1"></span>
                                <input type="hidden" name="airline_id" class="airlineId_1"></span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="md-form m-0">
                                        <input type="text" id="AutoCompleteAirlineCode_1" name="ticket_no[]" placeholder="ticket no" class="form-control m-0">                                    
                                    </div>
                                    <i class="icon-notification2 text-warning align-self-center pl-1" id="TickAutoStatus_1"></i>
                                </div>                             

                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="guestName_1" name="guest_name" class="form-control m-0">                                    
                                </div>
                            </td>
                            <td>
                            <select class="mdb-select md-form m-0" name="type[]">
                                
                                <option value="Adult">Adult</option>
                                <option value="Child">Child</option>
                                <option value="Infant">Infant</option>
                            </select>
                            </td>
                            <td class="position-relative">
                                <div class="Tddisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" name="qty[]" id="qty_1" class="form-control m-0 text-center qty" value=1>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" name="price[]" id="price_1" step="0.01" class="form-control m-0 text-center price" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Tddisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" id="amount_1" name="amount[]" step="0.01" class="form-control m-0 text-center amount" value=0>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" id="serviceFee_1" name="service_fee[]" step="0.01" class="form-control m-0 text-center service_fee" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Dtdisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" id="vat_1" name="vat[]" class="form-control m-0 text-center vat" step="0.01" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Dtdisabled"></div>
                                <div class="md-form m-0">
                                    <input type="text" id="serviceFeeVat_1" name="serviceFee_VAT" step="0.01"  class="form-control m-0 text-center serviceFee_VAT" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Dtdisabled"></div>
                                <div class="md-form m-0">
                                    <input type="text" id="subTotal_1" step="0.01" class="form-control m-0 text-center sub__total" value=0>                                    
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">

                        <div>
                            <div class="row mt-1">
                                <div class="col-lg-4 d-flex align-items-center ">
                                    <span>Routing</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 font-weight-bold">
                                        <input type="text" required="" class="form-control font-weight-bold"  id="routing" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mt-3 pl-0" id="btnCheck_single">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="1" name="checkbox">
                                    <label class="custom-control-label ml-3" for="defaultUnchecked1">Grouping</label>
                                </div>
                            
                        </div>

                        <div>
                            <div class="row mt-1">
                                <div class="col-lg-4 d-flex align-items-center ">
                                    <span>Supplier</span>
                                </div>
                                <div class="col d-flex">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 font-weight-bold">
                                        <input type="text" required="" class="form-control" placeholder="Type Supplier Name" id="supNameEn" autocomplete="off">
                                        <input type="hidden" id="supplier_id" name="supplier_id">
                                        <div class="AutoDisplaySup"></div>
                                    </div>
                                    <i class="icon-notification2 text-warning align-self-center" id="SupplierAutoStatus"></i>
                                </div>
                            </div>

                        </div>
                        
                        <div class="">
                            
                            <div class="row mt-1">
                                <div class="col d-flex align-items-center justify-content-end">
                                    <span>Deposit</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" required class="form-control font-weight-bold" style="border-color: #009688;" id="deposit_total" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col d-flex align-items-center justify-content-end">
                                    <span>Amount Total</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="0" step="0.01" class="form-control font-weight-bold" style="border-color: #009688;" id="Amount_total" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col d-flex align-items-center justify-content-end">
                                    <span>Service-Fee Total</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="0" step="0.01" class="form-control font-weight-bold" style="border-color: #009688;" id="SerFee_total" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col d-flex align-items-center justify-content-end">
                                    <span>VAT Total</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="0" step="0.01" required class="form-control font-weight-bold" style="border-color: #009688;" id="vat_total" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col d-flex align-items-center justify-content-end">
                                    <span>Grand Total</span>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" value="0" step="0.01" required class="form-control font-weight-bold" style="border-color: #009688;" id="grand_total" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="respond"></div>
                    <div class="mt-3">                    
                        <button type="button" class="btn btn-info btn-sm btn-rounded waves-effect waves-light new-row"><i class="icon-plus-circle2 pr-2 pt-0" aria-hidden="true"></i>Add More</button>
                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" id="delete" ><i class="icon-cancel-circle2 pr-2 pt-0" aria-hidden="true"></i>Remove</button>
                    </div>
                </div>
            </div>
    </div> 

    <div class="modal-footer">
        <div class="form-group text-center">
            <button class="btn btn-danger legitRipple waves-effect waves-light" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light">Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>