<form method="post" action="{{ action('SupplierController@update') }}">
    @csrf
    <input type="hidden" name="id" id="supplier_id">
    <div class="modal-body">
        <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h5 class="mb-0 font-weight-bold text-success">FORM EDIT</h5>
                        <span class="d-block text-muted">Enter your user detail below</span>
                    </div>                    
                    <div class="row">

                            <div class="col-lg-5">
                                <h5>Company Info</h5>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Company Name Kh" name="name_kh" id="name_kh" autocomplete="off" required >
                                    <div class="form-control-feedback">
                                        <i class="icon-magazine text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Company Name En" name="name_en" id="name_en" autocomplete="off" required >
                                    <div class="form-control-feedback">
                                        <i class="icon-magazine text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Register Number" name="register_number" id="register_number" autocomplete="off">
                                    <div class="form-control-feedback">
                                        <i class="icon-link2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="website" name="website" id="website" autocomplete="off">
                                    <div class="form-control-feedback">
                                        <i class="icon-sphere text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Address" name="address" id="address" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-location3 text-muted"></i>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="col">
                                <div class="d-flex">                                            
                                    <div> <h5 style="margin-bottom: 4px;">Supplier Contact Person</h5></div>
                                    <div class="ml-auto"><a href="#" style="text-decoration: underline;" id="add-more">+ ADD MORE ROW</a></div>
                                </div>
                                <table class="table" id="airline">
                                    <tbody>
                                        
                                    </tbody>
                                </table>

                                <span>  
                                   <span><input type="hidden" name="d_supplier_contact_delete" id="supplierContactDelete"></span>
                                </span>
                                
                            </div>

                    </div>

                    <p>Choose Service</p>
                    <div class="row">                               
                        @foreach($services as $service)                                        
                            <div class="col-md-3 p-1">                                   
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-checker border-primary-600 text-primary-800">
                                            <span class="v-{{ $service->id }} span-checkbox"> 
                                                <input type="checkbox" class="form-check-input-styled-primary" name="service_id[]" id="check_service" value="{{ $service->id }}">
                                            </span>
                                        </div>
                                        {{ $service->name }}
                                    </label>
                                </div>                    
                            </div>
                        @endforeach                                   
                    </div> 

                        

                </div>
            </div>
    </div> 

    <div class="modal-footer">
        <div class="form-group text-center">
            <button class="btn btn-danger legitRipple" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
</form>