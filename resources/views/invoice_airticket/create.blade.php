<style>
    table.table-create td{
        padding: 3px 12px;
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
                        <div class="mr-auto p-2">
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center ">
                                   <b> អតិថិជន/Customer : </b>
                                </div>
                                
                            </div>
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center ">
                                    ឈ្មោះក្រុមហ៊ុន ឬអតិថិជន
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col d-flex align-items-center ">
                                     Company name / Customer
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                        <input type="text" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off">
                                    </div>
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
                                        <input type="text" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off">
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
                                        <input type="text" class="form-control" placeholder="invoiceID" name="invoiceID" id="invoiceID" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>

                    <table class="table border table-create table-bordered">
                        <tr class="table-active table-border-double text-center">
                            <td class="p-3"></td>
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
                            <td class="position-relative text-center"> 
                                <div class="Dtdisabled"></div>  
                                <span class="loop">1</span>
                            </td>
                            <td class="position-relative text-center">
                                <div class="Dtdisabled"></div>
                                <span class="airline-code">ML</span>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="form1" class="form-control m-0">                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="text" id="form1" class="form-control m-0">                                    
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
                                    <input type="number" name="qty[]" id="qyt" class="form-control m-0 text-center qty" value=0>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" name="price[]" id="price" step="0.01" class="form-control m-0 text-center price" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Tddisabled"></div>
                                <div class="md-form m-0">
                                    <input type="number" id="amount" name="amount[]" step="0.01" class="form-control m-0 text-center amount" value=0>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" id="service_fee" name="service_fee[]" step="0.01" class="form-control m-0 text-center service_fee" value=0>                                    
                                </div>
                            </td>
                            <td>
                                <div class="md-form m-0">
                                    <input type="number" id="vat" name="vat[]" class="form-control m-0 text-center vat" step="0.01" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Dtdisabled"></div>
                                <div class="md-form m-0">
                                    <input type="text" id="serviceFee_VAT" name="serviceFee_VAT" class="form-control m-0 text-center serviceFee_VAT" value=0>                                    
                                </div>
                            </td>
                            <td class="position-relative">
                                <div class="Dtdisabled"></div>
                                <div class="md-form m-0">
                                    <input type="text" id="sub_total" class="form-control m-0 text-center sub__total" value=0>                                    
                                </div>
                            </td>
                        </tr>
                    </table>

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