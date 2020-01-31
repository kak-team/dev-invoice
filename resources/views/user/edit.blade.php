<!-- <form method="POST" action="{{ action('UserController@create') }}"> -->
<form method="POST" action=" {{ route('register') }}">
                @csrf
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 font-weight-bold">FORM CREATE</h5>
                                <span class="d-block text-muted">Enter your user detail below</span>
                            </div>
                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off">
                                <label for="name"><i class="icon-magazine text-muted"></i> Full Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="off">
                                <label for="username"><i class="icon-user text-muted"></i></i> Username</label>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="off">
                                <label for="email"><i class="icon-envelop4 text-muted"></i> Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" required autocomplete="off" >
                                <label for="password"><i class="icon-lock2 text-muted"></i> Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm"><i class="icon-lock2 text-muted"></i> Confirm Password</label>
                                @error('comfirm-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>               

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <div class="row m-0">
                                    <label class="form-check-label mr-3  text-muted">
                                        Choose User Level
                                    </label>
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="radio" class="custom-control-input" id="defaultUnchecked1" value="admin" name="role" checked>
                                            <label class="custom-control-label" for="defaultUnchecked1">Admin</label>
                                        </div>
                                        <input type="hidden" class="custom-control-input" value="vat" name="status" checked>
                                    </div>
                                    <div class="form-check ml-3">
                                    <div class="custom-control custom-checkbox" id="btnCheck_single1">
                                            <input type="radio" class="custom-control-input" id="defaultUnchecked2" value="staff" name="role">
                                            <label class="custom-control-label" for="defaultUnchecked2">Staff</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group text-center">
                    <button class="btn btn-danger legitRipple" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
                </div>
            </form>