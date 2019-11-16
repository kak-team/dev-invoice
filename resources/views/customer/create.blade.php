<form method="post" action="{{ action('CustomerController@store') }}">
    @csrf
    <div class="modal-body">
        <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h5 class="mb-0 font-weight-bold text-success">FORM CREATE</h5>
                        <span class="d-block text-muted">Enter your user detail below</span>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
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
                                    <div> <h5 style="margin-bottom: 4px;">Customer Contact Person</h5></div>
                                    <div class="ml-auto"><a href="#" style="text-decoration: underline;" id="add-more">+ ADD MORE ROW</a></div>
                                </div>
                                <table class="table" id="airline">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                    <input type="text" class="form-control" placeholder="Full name" name="fullname[]" id="fullname" required="" autocomplete="off">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user text-muted"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                    <input type="text" class="form-control" placeholder="Phone" name="c_phone[]" id="c_phone" required="" autocomplete="off">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-phone-wave text-muted"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                    <input type="text" class="form-control" placeholder="Contact Email" name="c_email[]" id="c_email" required="" autocomplete="off">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-envelop4 text-muted"></i>
                                                    </div>                                                
                                                </div>  
                                            </td>
                                            <td class="pb-0 pt-0" id="delete">
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>

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