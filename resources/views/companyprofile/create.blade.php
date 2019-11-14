<form method="post" action="{{ action('AirlineController@store') }}">
    @csrf 
    <div class="modal-body">
        <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h5 class="mb-0 font-weight-bold text-success">FORM CREATE</h5>
                        <span class="d-block text-muted">Enter your user detail below</span>
                    </div>
                    <div class="ml-auto text-right"><a style="text-decoration: underline;" id="add-more">+ ADD MORE ROW</a></div>
                    <table class="table table-borderless" id="airline">
                        <tr>
                            <td>
                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Airline name" name="airline_name[]" id="airline_name" autocomplete="off" >
                                    <div class="form-control-feedback">
                                        <i class="icon-magazine text-muted"></i>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Airline Code" name="airline_code[]" id="airline_code" autocomplete="off">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                            </td>
                            <td></td>
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

