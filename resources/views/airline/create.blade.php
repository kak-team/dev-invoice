@extends('master')
@section('content')
<style>
.icon-minus-circle2{
    cursor: pointer;
}
</style>
<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
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
                                <p class="font-weight-bold text-underline"><a href="#" style="text-decoration: underline;" id="add-more">+ ADD MORE ROW</a></p>
                                <table class="table" id="airline">
                                    <tr>
                                        <td>
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                <input type="text" class="form-control" placeholder="Airline name" name="airline_name[]" id="airline_name" required autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-earth text-muted"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                <input type="text" class="form-control" placeholder="Airline Code" name="airline_code[]" id="airline_code" required autocomplete="off">
                                                <div class="form-control-feedback">
                                                    <i class="icon-link2 text-muted"></i>
                                                </div>                                                
                                            </div>  
                                        </td>
                                        <td class="pb-0 pt-0" id="delete">
                                            <div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div>
                                        </td>
                                    </tr>
                                </table>


                               
                                
                                
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
            
            <form method="post">
                <div class="modal-body">
                    <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h5 class="mb-0 font-weight-bold text-success">FORM EDIT</h5>
                                    <span class="d-block text-muted">Enter your user detail below</span>
                                </div>
                                <table class="table" id="airline">
                                    <tr>
                                        <td>
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                <input type="hidden" id="airline_id" name="id">
                                                <input type="text" class="form-control" placeholder="Airline name" name="airline_name" id="airline_name" required autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-earth text-muted"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                                                <input type="text" class="form-control" placeholder="Airline Code" name="airline_code" id="airline_code" required autocomplete="off">
                                                <div class="form-control-feedback">
                                                    <i class="icon-link2 text-muted"></i>
                                                </div>                                                
                                            </div>  
                                        </td>
                                    </tr>
                                </table>
                                
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
                <h6 class="modal-title">DELETE AIRLINE</h6>
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
            <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled" id="deleteRow"  data-target="#modal_theme_danger"><i class="icon-trash"></i></button>

            </div>
                   </div>
        <div class="table-responsive">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td><div class="uniform-checker"><span id="b4-check"><input type="checkbox" class="form-input-styled" id="checkall"></span></div>
                        </td>
                        <td class="text-blue-800 font-weight-bold">AIRLINE NAME</td>
                        <td class="text-blue-800 font-weight-bold">AIRLINE CODE</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                    <?php for($a=1;$a<=4;$a++): 
                        echo '<tr>
                            <td><div class="uniform-checker"><span id="b4-check"><input type="checkbox" class="form-input-styled" id="checkself"></span></div></td>
                            <td><div class="d-flex align-items-center"><div><a href="#" class="text-default font-weight-semibold">Air ASIA </a></div></div></td>
                            <td><div><a href="#" class="text-default font-weight-semibold">969</a></div></td>
                            <td><a href="#" id="airline-status" class="active"><span class="badge bg-blue">Active</span></a></td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="'.$a.'" airline-name="Air ASIA" airline-code="969"><i class="icon-quill4"></i></button></td>
                        </tr>';
                        endfor; 
                    ?>
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="card card-body py-2">
            <ul class="pagination-flat justify-content-center twbs-page-start pagination "><li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li><li class="page-item active"><a href="#" class="page-link">1</a></li><li class="page-item"><a href="#" class="page-link">2</a></li><li class="page-item"><a href="#" class="page-link">3</a></li><li class="page-item"><a href="#" class="page-link">4</a></li><li class="page-item next"><a href="#" class="page-link">Next</a></li></ul>
        </div>
    </div>
   
</div>
<script>
$(document).ready(function(){

    var i = 0;
    // add-more
    $('#modal_theme_success').on('click','#add-more',function(){
        var html = '<tr>';
            html += '<td><div class="form-group form-group-feedback form-group-feedback-left mb-0">';
                html += '<input type="text" class="form-control" placeholder="Airline name" name="airline_name[]" id="airline_name" required autocomplete="off">';
                html += '<div class="form-control-feedback">';
                html += '<i class="icon-earth text-muted"></i></div></div>';
            html += '</td>';
            html += '<td><div class="form-group form-group-feedback form-group-feedback-left mb-0">';
                html += '<input type="text" class="form-control" placeholder="Airline Code" name="airline_code[]" id="airline_code" required autocomplete="off">';
                html += '<div class="form-control-feedback">';
                html += '<i class="icon-link2 text-muted"></i></div></div>';
            html += '</td>';
            html += '<td class="pb-0 pt-0" id="delete"><div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
        $('#modal_theme_success #airline').append(html);
    });

    // edit 
    $('.table-responsive').on('click','#btn-edit',function(){
        $('#modal_theme_info #airline_name').val($(this).attr('airline-name'));
        $('#modal_theme_info #airline_code').val($(this).attr('airline-code'));
        $('#modal_theme_info #airline_id').val($(this).val());
    });

    // status
    $('.table-responsive').on('click','#airline-status',function(){
        $(this).toggleClass('active');
        if( $(this).hasClass('active')){
            $(this).html('<span class="badge bg-blue">Active</span>');
            
        }else{
            $(this).html('<span class="badge bg-warning">Disabled</span>');
        }
    });


});
</script>
@stop