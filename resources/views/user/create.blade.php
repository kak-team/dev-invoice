@extends('master')
@section('content')

<div class="row">
    <div class="col-lg-8">
    <div class="card">
        <div class="card-header header-elements-sm-inline py-2">
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> USER LIST</h6>
            <div>
            <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1"><i class="icon-plus-circle2"></i></button>
            <button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1"><i class="icon-quill4"></i></button>
            <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple"><i class="icon-trash"></i></button>

            </div>
                   </div>
        <div class="table-responsive">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td>
                            <div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" checked="" data-fouc=""></span></div>
                        </td>
                        <td class="text-blue-800 font-weight-bold">USERNAME</td>
                        <td class="text-blue-800 font-weight-bold">FULLL NAME</td>
                        <td class="text-blue-800 font-weight-bold">LEVEL</td>
                        <td class="text-blue-800 font-weight-bold">EMAIL</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                    </tr>
                    <?php for($a=0;$a<=4;$a++): ?>
                        <tr>
                            <td>
                            <div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" checked="" data-fouc=""></span></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
                                        <span class="letter-icon">S</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Mr.Admin</a>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Long Sopha</span></td>
                            <td><span class="text-default font-weight-semibold">Admin</span></td>
                            <td><span class="text-default font-weight-semibold">longsopha@yahoo.com</span></td>
                            <td><span class="badge bg-blue">Active</span></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="card card-body py-2">
            <ul class="pagination-flat justify-content-center twbs-page-start pagination "><li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li><li class="page-item active"><a href="#" class="page-link">1</a></li><li class="page-item"><a href="#" class="page-link">2</a></li><li class="page-item"><a href="#" class="page-link">3</a></li><li class="page-item"><a href="#" class="page-link">4</a></li><li class="page-item next"><a href="#" class="page-link">Next</a></li></ul>
        </div>
    </div>
    <div class="col-lg-4">
    <form class="login-form" action="#">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<h5 class="mb-0 font-weight-bold">FORM CREATE</h5>
								<span class="d-block text-muted">Enter your user detail below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="fullname" name="fullname" id="fullname">
								<div class="form-control-feedback">
									<i class="icon-magazine text-muted"></i>
								</div>
							</div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="username" name="username" id="username" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="password" name="password" id="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" class="form-control" placeholder="email" name="email" id="email">
								<div class="form-control-feedback">
									<i class="icon-envelop4 text-muted"></i>
								</div>
							</div>

                            

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <div class="row m-0">
                                    <label class="form-check-label mr-3  text-muted">
                                        Choose Level
                                    </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <div class="uniform-checker border-primary-600 text-primary-800"><span>
                                            <input type="checkbox" class="form-check-input-styled-primary" checked="" data-fouc=""></span></div>
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <label class="form-check-label">
                                            <div class="uniform-checker border-primary-600 text-primary-800"><span><input type="checkbox" class="form-check-input-styled-primary" checked="" data-fouc=""></span></div>
                                            Staff
                                        </label>
                                    </div>
                                </div>
							</div>

							<div class="form-group text-center">
                                <button class="btn btn-danger">Cancel</button>
								<button type="submit" class="btn btn-primary legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
						</div>
					</div>
				</form>
    </div>
</div>
@stop