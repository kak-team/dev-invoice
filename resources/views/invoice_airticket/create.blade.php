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
                                   <b> Customer Info : </b>
                                </div>                                
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 d-flex align-items-center ">
                                     Company name / Customer
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
                            
                            <div class="row mb-2">
                                <div class="col-lg-4 d-flex align-items-center ">
                                     Contact Person :
                                </div>
                                <div class="col d-flex " id="contactPerson">
                                    <select class="mdb-select md-form m-0 w-100 dashed mdbContact" >                                    
                                        <option value="" disabled selected>No Contact</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 d-flex align-items-center ">
                                     Phone :
                                </div>
                                <div class="col d-flex ">                                
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0 w-100">
                                        <input type="text" class="form-control dashed" placeholder="Customer Name En" id="phone" required="" autocomplete="off">
                                        <div class="AutoDisplay"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col d-flex align-items-center ">
                                   <b> Supplier Info : </b>
                                </div>                                
                            </div>
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
                        <div class="p-2">
                            <div class="col d-flex align-items-center pl-0">
                                <b> System Record: </b>
                            </div>
                            <!-- Invoice ID -->
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="m-0"><span>Invoice No :</span> </p>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" disabled value="Draf Number" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice ID -->
                            <div class="row mt-2">
                                <div class="col d-flex align-items-center">
                                    <p class="m-0"><span>Invoice Date :</span> </p>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="date" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="my-2 d-flex">                    
                        <button type="button" class="btn btn-info btn-sm btn-rounded waves-effect waves-light new-row"><i class="icon-plus-circle2 pr-0 pt-0" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" id="delete" ><i class="icon-cancel-circle2 pr-0 pt-0" aria-hidden="true"></i></button>
                        <div class="custom-control custom-switch ml-auto d-flex align-items-end">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Grouping</label>
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
                            <td style="width:120px;">Airline</td>
                            <td style="width:120px;">Ticket No</td>
                            <td style="width: 170px;">Guest Name</td>                            
                            <td style="width: 120px;">Type</td>
                            <td>Qty</td>
                            <td>Sell Price</td>
                            <td>Service Fee</td>
                            <td>VAT</td>
                            <td>Service Fee + VAT</td>
                                                    
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
                            <td class="text-center">
                                <div class="d-flex">
                                    <div class="md-form m-0">
                                        <input type="text" class="airlineId_1 form-control m-0" id="airlineName_1" placeholder="airline name"></span>
                                        <input type="hidden" name="airline_id[]" id="airlineId_1">
                                        <div id="autoDisplay_airlineName_1"></div>
                                    </div>
                                    <i class="icon-notification2 text-warning align-self-center pl-1" id="iconAirline_1"></i>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="md-form m-0">
                                        <input type="text" id="ticketNo_1" name="ticket_no[]" placeholder="ticket no" class="form-control m-0">                                    
                                    </div>
                                    <i class="icon-notification2 text-warning align-self-center pl-1" id="iconTicketNo_1"></i>
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
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">

                        <div class="col-lg-5 mt-3">
                            <div class="col px-0">
                                <label for="deposit_total" class="font-weight-bold text-dark mb-0">Routing</label>
                                <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                    <input type="text" class="form-control font-weight-bold totalInput border-color" id="routing" required="" autocomplete="off">
                                </div>
                            </div>
                            
                            <!--Description-->
                            <div class="md-form md-outline">
                            <textarea id="form75" class="md-textarea form-control w-100" rows="5"></textarea>
                            <label for="form75">Description</label>
                            </div>
                            
                        </div>

                        
                        
                        <div class="col-lg-5 mt-3">
                            <div class="row">
                                <div class="col-lg-4 pr-1">
                                    <label for="SerFee_total" class="font-weight-bold text-dark mb-0">Service-Fee Total</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">                                        
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="SerFee_total" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="vat_total" class="font-weight-bold text-dark mb-0">Vat Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="vat_total" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 pt-2 border-top">
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Deposit Total</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" class="form-control font-weight-bold totalInput border-color" id="deposit_total" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col pr-1">
                                    <label for="Amount_total" class="font-weight-bold text-dark mb-0">Amount Total</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="Amount_total" value="0.00" required="" autocomplete="off">    
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Exchage Riel</label>
                                    <div class=" md-bg form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" class=" form-control font-weight-bold totalInput border-color" id="exchange_riel" value="{{ $company_profile[0]->exchange_kh }}" required="" autocomplete="off">    
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 pt-2 border-top">
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Dollar</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="grand_dollar" value="0.00" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col pr-1">
                                    <label for="deposit_total" class="font-weight-bold text-dark mb-0">Grand Total Riel</label>
                                    <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                                        <input type="number" step="0.01" readonly class="bgwhiteblue form-control font-weight-bold totalInput border-color" id="drand_riel" value="0.00" required="" autocomplete="off">
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
            <button class="btn btn-danger legitRipple waves-effect waves-light" type="button" data-dismiss="modal" id="iaSave">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple waves-effect waves-light">Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>