@extends('master')
@section('content')

<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 font-weight-bold">FORM CREATE</h5>
                                <span class="d-block text-muted">Enter your user detail below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="fullname" name="fullname" id="c_fullname">
                                <div class="form-control-feedback">
                                    <i class="icon-magazine text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="username" name="username" id="c_username" autocomplete="off">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="password" name="password" id="c_password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="email" class="form-control" placeholder="email" name="email" id="c_email">
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

<div id="modal_theme_info" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 font-weight-bold">FORM EDIT</h5>
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

<div id="modal_theme_danger" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger p-2 pr-3">
                <h6 class="modal-title">MESSAGE </h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-0">
                    <i class="icon-trash icon-2x text-danger-800 border-danger-800 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Are you sure to delete ?</h5>
                    <span class="d-block text-muted">Note: you can view all list delete in trash</span>
                </p>
                <hr class="col-lg-8">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-danger legitRipple">I understand</button>
            </div>
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
            <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled" id="deleteRow" data-target="#modal_theme_danger"><i class="icon-trash"></i></button>
            </div>
                   </div>
        <div class="table-responsive">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td>
                            <div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" id="checkall"></span></div>
                        </td>
                        <td class="text-blue-800 font-weight-bold">FULL NAME</td>
                        <td class="text-blue-800 font-weight-bold">USERNAME</td>
                        <td class="text-blue-800 font-weight-bold">LEVEL</td>
                        <td class="text-blue-800 font-weight-bold">EMAIL</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                    <?php for($a=0;$a<=4;$a++): ?>
                        <tr>
                            <td><div class="uniform-checker"><span id="b4-check"><input type="checkbox" class="form-input-styled" id="checkself"></span></div></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                        <span class="text-icon">K</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="text-default font-weight-semibold">SETDONA KOL</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a class="text-default font-weight-semibold">Mr.Dona </a>
                                    <div class="text-muted font-size-sm">
                                        Tel : 012 423 858 
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-default font-weight-semibold">admin</span></td>
                            <td><span class="text-default font-weight-semibold">kolsaiddona@gmail.com</span></td>
                            <td><a id="btn-status" class="active"><span class="badge bg-blue">Active</span></a></td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="1" company_name="Phnom Penh Airplane" register_number="10200391" website="phnompenhairplance.com.kh" address="Phnom Penh" value="1" service_id="[1,3,4]"><i class="icon-quill4"></i></button></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="card card-body py-2">
            <ul class="pagination-flat justify-content-center twbs-page-start pagination ">
                <li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item next"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
   
</div>
<script>
    $(document).ready(function(){
    
        // Edit
        $('.table-responsive').on('click','#btn-edit',function(){
            $(this).each(function() {
                $.each(this.attributes, function() {
                    // this.attributes is not a plain object, but an array
                    // of attribute nodes, which contain both the name and value
                    if(this.specified) {
                    //console.log(this.name, this.value);
                    $('#modal_theme_info #'+this.name).val(this.value);
                    }
                });
            });

            // remove checked box first
            $("#modal_theme_info").each(function(){
                $('#modal_theme_info .span-checkbox').removeClass('checked');
            });

            // add checked box by data
            var serviceIdArray = JSON.parse($(this).attr('service_id'));            
            var i;
            for (i = 0; i < serviceIdArray.length; i++) {
                $('#modal_theme_info .v-'+serviceIdArray[i]).addClass('checked');
            }
                
        });


        // Select chekbox service
        $('#modal_theme_success,#modal_theme_info').on('click','#check_service',function(){
            $(this).parent().toggleClass('checked');
        });
    });


</script>
@stop