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

    


});
</script>
@stop