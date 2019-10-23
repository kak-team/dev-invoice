@extends('master')
@section('content')
<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form method="post">
                <div class="modal-body">
                    <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h5 class="mb-0 font-weight-bold text-success">FORM CREATE</h5>
                                    <span class="d-block text-muted">Enter your user detail below</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="company_name" name="company_name" id="company_name" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAV9JREFUOBGVVLuKg0AUvcpCQiB/sAuCYBNMYWtrs0Gwyi+s4E8k4kdItrHKL8h+h612uwRsBDtTiDtnYmbHxTy8kMx9nHP0zr2ohGH43nXdgf3e6AlTFOWbwT72+/0X4OoUMgj9gz7hwyDw1JMv8Mu/zFHlwiN/sViQYRgD2CQBTdPIcZxxgfl8Lgqz2YzYZYlYrolk77zgdF2XLMui4/FIVVVREAR0Op0oSZJB7T8Z8aQWxgSU3W7XoYDXbJqGY9DC+Xwew4sca/GHBb54gysZiEdkYNgoX9lxEAJI3rPtdkts+0jXdQGDyFMCpmnSarUSRNlR+92WcwN/uVzSZrPhUxkU+gAC/j0Rz/OormvK85xTsI2y/W2LnGX+dTroW7a2bSmKIpHiiySiESeOY55dr9dk2zalaTpA3RTAnHHLZVlyQpZlvJWiKIQAMDcFGAp3gw8N5k0QuoohBpkd/i9CoHzgkM8LEwAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="form-control-feedback">
                                        <i class="icon-magazine text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="register_name" name="register_name" id="register_name" autocomplete="off">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="website" name="website" id="website" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAV9JREFUOBGVVLuKg0AUvcpCQiB/sAuCYBNMYWtrs0Gwyi+s4E8k4kdItrHKL8h+h612uwRsBDtTiDtnYmbHxTy8kMx9nHP0zr2ohGH43nXdgf3e6AlTFOWbwT72+/0X4OoUMgj9gz7hwyDw1JMv8Mu/zFHlwiN/sViQYRgD2CQBTdPIcZxxgfl8Lgqz2YzYZYlYrolk77zgdF2XLMui4/FIVVVREAR0Op0oSZJB7T8Z8aQWxgSU3W7XoYDXbJqGY9DC+Xwew4sca/GHBb54gysZiEdkYNgoX9lxEAJI3rPtdkts+0jXdQGDyFMCpmnSarUSRNlR+92WcwN/uVzSZrPhUxkU+gAC/j0Rz/OormvK85xTsI2y/W2LnGX+dTroW7a2bSmKIpHiiySiESeOY55dr9dk2zalaTpA3RTAnHHLZVlyQpZlvJWiKIQAMDcFGAp3gw8N5k0QuoohBpkd/i9CoHzgkM8LEwAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="address" name="address" id="address">
                                    <div class="form-control-feedback">
                                        <i class="icon-envelop4 text-muted"></i>
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header header-elements-sm-inline py-2">
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> SUPPLIER LIST</h6>
            <div>
                <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="form-control-feedback">
                        <i class="icon-search4"></i>
                    </div>
                </div>
            </div>
            <div>
            <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_success"><i class="icon-plus-circle2"></i></button>
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
                        <td class="text-blue-800 font-weight-bold">COMPANY NAME</td>
                        <td class="text-blue-800 font-weight-bold">CONTACT</td>
                        <td class="text-blue-800 font-weight-bold">REGISTER NUMBER</td>
                        <td class="text-blue-800 font-weight-bold">WEBSITE</td>
                        <td class="text-blue-800 font-weight-bold">ADDRESS</td>
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
                                        <a href="#" class="text-default font-weight-semibold">Phnom Penh Airplane </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="#" class="text-default font-weight-semibold">Ms. Srey Sor</a>
                                    <div class="text-muted font-size-sm">
                                        Tel : 012 423 858 
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">000293140</span></td>
                            <td><span class="text-default font-weight-semibold">phnompenhairplance.com.kh</span></td>
                            <td><span class="text-default font-weight-semibold">Phnom Penh</span></td>
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
   
</div>
@stop