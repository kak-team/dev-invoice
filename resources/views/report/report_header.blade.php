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
</style>
<div class="col-md-12 d-flex p-3">
    <div class="col">
        <!-- Material form contact -->
        <div class="card">
            <small class="card-header info-color white-text text-center p-1">
                Filter by date
            </small>
            <!--Card content-->
            <div class="card-body pb-0">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="#!">
                    <div class="row pt-3">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <!--The "from" Date Picker -->
                                <input placeholder="Selected starting date" type="text" id="startingDate" class="form-control datepicker">
                                <label for="startingDate">From Date</label>
                            </div>

                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-6">

                            <div class="md-form">
                                <!--The "to" Date Picker -->
                                <input placeholder="Selected ending date" type="text" id="endingDate" class="form-control datepicker">
                                <label for="endingDate">To Date</label>
                            </div>
                        </div>
                    </div>    
                </form>
                <!-- Form -->

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
    <div class="col">
        <!-- Material form contact -->
        <div class="card">
            <small class="card-header success-color white-text text-center p-1">
                Filter by specifect invoice
            </small>
            <!--Card content-->
            <div class="card-body pb-0">
                <!-- Form -->
                <div class="row">
                    <select class="mdb-select md-form mb-0 mt-1 w-100">
                        <option value="" disabled selected>Choose service type</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>

                <div class="row">
                    <!-- Material input -->
                    <div class="md-form my-0 pb-2 w-100">
                        <input type="text" id="form1" class="form-control">
                        <label for="form1">Invoice Number</label>
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
<!--end header report-->

<script>
  // Get the elements
$(document).ready(function(){
    var from_input = $('#startingDate').pickadate(),
        from_picker = from_input.pickadate('picker')
    var to_input = $('#endingDate').pickadate(),
        to_picker = to_input.pickadate('picker')

    // Check if there’s a “from” or “to” date to start with and if so, set their appropriate properties.
    if (from_picker.get('value')) {
        to_picker.set('min', from_picker.get('select'))
    }
    if (to_picker.get('value')) {
        from_picker.set('max', to_picker.get('select'))
    }

    // Apply event listeners in case of setting new “from” / “to” limits to have them update on the other end. If ‘clear’ button is pressed, reset the value.
    from_picker.on('set', function (event) {
        if (event.select) {
        to_picker.set('min', from_picker.get('select'))
        } else if ('clear' in event) {
        to_picker.set('min', false)
        }
    })
    to_picker.on('set', function (event) {
        if (event.select) {
        from_picker.set('max', to_picker.get('select'))
        } else if ('clear' in event) {
        from_picker.set('max', false)
        }
    });

    //select customer menu
    $('.mdb-select').materialSelect();
});
</script>