@extends('master')
@section('content')
<style>
.font {
    font-family: battambang, Roboto,-apple-system,BlinkMacSystemFont;
}
.fixed-sn main {
    padding-top: 2.5rem;
}
.company-name {
    font-family: moul, Roboto;
}
.company-en-name {
    font-family:Roboto;
    font-weight: 600;
}
</style>
<style>
.picker__holder, .picker__frame{
    display: table;
    min-height: 100%;
    min-width:100%;
}
label, .md-form .form-control[readonly],  .filtrable, .select-wrapper input.select-dropdown{
    font-size:13px!important;
    font-weight:100!important;

}
.picker--opened .picker__frame{
    min-width: 25em!important;
}
.picker__header{
    padding-top:0!important;
}
.picker__weekday-display, .picker__month-display, .picker__day-display{
    font-size:12px!important;
}
.picker__nav--prev, .picker__nav--next {
    margin-top: -38px!important;
}
.picker__box .picker__header .picker__select--year, 
.picker__box .picker__header .picker__select--month{
    width:45%!important;
}
.white-skin input[type=checkbox]:checked+label:before{
    border-right: 0px solid #4285f4;
    border-bottom: 0px solid #4285f4;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<div class="fixed-sn white-skin js-focus-visible container-fluid bg-white">
            <section class="invoice font row">

            <div class="col-md-12 d-flex p-3">
    <div class="col">
        <!-- Material form contact -->
        <div class="card" id="filter_date">
            <small class="card-header info-color white-text text-center p-2 mb-2">
                Filter by date
            </small>
            <div class="card-body">
                <div class="row">                               
                    @foreach($services as $service)                                        
                        <div class="col-md-6 p-1">                                   
                            
                            <div class="custom-control custom-checkbox" id="btnCheck_single">
                                <input type="checkbox" name="checkbox" class="custom-control-input Bchk" id="c_{{ $service->id }}" value="{{ $service->id }}">                                    
                                <label class="custom-control-label" for="c_{{ $service->id }}">{{ $service->name }}</label>
                            </div>                 
                        </div>
                    @endforeach                                   
                </div> 
                <div class="row mt-2">
                    <div class="col">
                        <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                            <input type="date" class="form-control font-weight-bold totalInput border-color" id="from_date"  value="{{ date('Y-m-d') }}" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group form-group-feedback form-group-feedback-left mb-0 border font-weight-bold">
                            <input type="date" class="form-control font-weight-bold totalInput border-color" id="to_date"  value="{{ date('Y-m-d') }}" required="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-success" id="query_filter">Query Data</button>
                </div>

            </div>
        </div>
        <!-- Material form contact -->
    </div>
    <div class="col">
        <!-- Material form contact -->
        <div class="card">
            <small class="card-header primary-color white-text text-center p-1">
                Filter by stutus
            </small>
            <!--Card content-->
            <div class="card-body">
                <div class="row d-flex align-items-center pt-3">
                    <div class="col my-1">
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input Bchk" id="c_1">
                            <label class="custom-control-label text-nowrap" for="c_1">New Invoice</label>
                        </div>
                    </div>
                    <div class="col my-1">
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input Bchk" id="c_1">
                            <label class="custom-control-label text-nowrap" for="c_1">Cancel Invoice</label>
                        </div>
                    </div>
                    <div class="col my-1">
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input Bchk" id="c_1">
                            <label class="custom-control-label text-nowrap" for="c_1">Deposit Invoice</label>
                        </div>
                    </div>
                    <div class="col my-1">
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input Bchk" id="c_1">
                            <label class="custom-control-label text-nowrap" for="c_1">Full Payment</label>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                
            </div>
        </div>
    </div>
   
</div>
<!--search by people-->
<div class="col-md-12 d-flex p-3">
    <div class="col">
        <select class="mdb-select md-form mb-0 mt-1 w-100">
            <option value="" disabled selected>Choose customer</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <select class="mdb-select md-form mb-0 mt-1 w-100">
            <option value="" disabled selected>Choose seller</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
    </div>
    <div class="col">
        hello
    </div>
    <div class="col">
        hello
    </div>
    <div class="col">
        hello
    </div>
    <div class="col">
        hello
    </div>
</div>

                <div class="col-md-12">
                    <!-- Second row -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="text-center pt-5">
                                    <h1>Report</h1>
                                </div>
                                </span>
                                <table class="table table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-nowrap small">Issued Date</th>
                                            <th class="text-center text-nowrap small">Invoice Number</th>
                                            <th class="text-center text-nowrap small">Provider Name</th>
                                            <th class="text-center text-nowrap small">Service Type</th>
                                            <th class="text-center text-nowrap small">Company Name</th>
                                            <th class="text-center text-nowrap small">Total</th>
                                            <th class="text-center text-nowrap small">Balence</th>
                                            <th class="text-center text-nowrap small">Sale By</th>
                                            <th class="text-center text-nowrap small">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="result">
                                        <tr class="small">
                                            <td class="col-md-9"><em>Baked Rodopa Sheep Feta</em></h4></td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>

                                        </tr>
                                        <tr class="small">
                                            <td class="col-md-9"><em>Lebanese Cabbage Salad</em></h4></td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div ></div>
                            </div>
                        </div>
                        <!-- /.Second row -->
                </div>
            </section>
</div>   


<script>
  // Get the elements
$(document).ready(function(){
    // hidden menu left
    $('.navbar-top').addClass('sidebar-xs');

    // Token CSRF
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $('#query_filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();		
        var arrayCheckBox = new Array();
            $('#filter_date input[name="checkbox"]:checked').each(function() {
            arrayCheckBox.push(this.value);
        });        
        var service =arrayCheckBox.toString();
        $.ajax({
            type : 'post',
            data : { from_date : from_date, to_date : to_date, service : service },
            url  : 'report/auto_filter',
            success : function(repsond){
                $('#result').html(repsond);
            }
        });
    });
});
</script>


@stop 