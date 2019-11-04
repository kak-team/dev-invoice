<<<<<<< HEAD
<form method="post" action="{{ action('SupplierController@store') }}">
                @csrf
=======
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
                                    <input type="text" class="form-control" placeholder="Airline name" name="airline_name" id="airline_name" autocomplete="off" >
                                    <div class="form-control-feedback">
                                        <i class="icon-magazine text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Airline Code" name="airline_code" id="airline_code" autocomplete="off">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
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
<<<<<<< HEAD
            </form>
=======
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header header-elements-sm-inline py-2">
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> AIRLINE LIST</h6>
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
                        <td class="text-blue-800 font-weight-bold">AIRLINE NAME</td>
                        <td class="text-blue-800 font-weight-bold">AIRLINE CODE</td>
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
                                        <a href="#" class="text-default font-weight-semibold">Air ASIA </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="#" class="text-default font-weight-semibold">969</a>
                                </div>
                            </td>
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

