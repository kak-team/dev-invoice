@extends('master')
@section('content')
<style>
    table#airline td {
        padding: 5px;
    }

    #tbl_room td{
        padding: 2px 0px;
    }
    table#supplier_contact td {
        padding: 2px;
    }
    .modal-dialog.modal-lg{
        max-width: 1200px!important;
    }
    .chip{
        margin-bottom : 5px;
    }
</style>
<style>
    table.table-create td{
        padding: 0px 12px;
    }
    input.select-dropdown{
        margin: 0px!important;
        font-size: 12px!important;
        
    }
    table.table-create input{
        padding: 0px!important;
        border:0px !important;  
    }
    table.table-create tr.table-active td{
        white-space: nowrap;
    }
    .position-relative{
        background: #f7f7f7;
    }
    .Tddisabled{
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 1;

    }
    input[type='number'] {
    -moz-appearance:textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    .custom-control-label::before,.custom-control-label::after{
        left : -25px;
    }

    .mdb-autocomplete-wrap{
        white-space: nowrap;
        min-width: 315px;
    }

    .form-group-feedback-left .form-control{
        padding-left: 5px;
    }
    .list-group{
        padding:0px;
        border:0px;
    }
    body.modal-open{
        overflow:hidden;
    }
    .modal-open1 .modal {
        overflow-x: hidden;
        overflow-y: auto;
    }
    body.navbar-top.modal-open1 {
        overflow: hidden;
    }
    .border-color{
        border-color: #009688;
    }
    .totalInput {
        font-size: 14px;
        height: 32px;
    }
    .text-dark {
        color: #526973!important;
        text-transform: uppercase;
        font-size: 11px;
    }
    .bgwhiteblue{
        background: #e9f8fd!important;
    }
</style>

<style media="print">
.modal-footer,.z-depth-1{
    display:none;
}
</style>

@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<div class="modal fade" id="modal_theme_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content" id="bodyModal">
        <!--Body-->         
        @include('invoice_airticket_list.create')
        
      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="modal_theme_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content" id="bodyModal">

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade " id="modal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
            
        </div>
        <div class="modal-footer">
            <div class="form-group text-center">
                <button class="btn btn-danger legitRipple waves-effect waves-light" type="button" data-dismiss="modal" id="iaSave">Cancel</button>
                <button type="button" id="print" class="btn btn-success legitRipple waves-effect waves-light">Print<i class="icon-circle-right2 ml-2"></i></button>
            </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade modal_in_modal" id="modal_netprice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1">         
          <div class="md-form ml-0 mr-0">
            <input type="number" step="0.01" id="modalNF" class="form-control ml-0">
          </div>

          <div class="text-center mt-4">
            <button class="btn btn-cyan waves-effect waves-light modal_fix_overflow" data-dismiss="modal">Save and Close
              <i class="fas fa-sign-in ml-1"></i>
            </button>
          </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade modal_in_modal" id="modal_paymentEdit" tabindex="-1" style="z-index:100000;" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body text-center mb-1">         
            
            </div>
        </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade modal_in_modal" id="modal_paymentDelete" tabindex="-1" style="z-index:100000;" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
                  
        </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade" id="Modal_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" style="max-width:1100px" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body text-center mb-1" id="bodyModal">         
            
        </div>
      </div>
      <!--/.Content-->
    </div>
</div>
<div class="modal fade " id="modal_cancel_payment" tabindex="-1" style="z-index:100000;" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                       
            </div>
        </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-2">
                <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> INVOICE AIR-TICKET LIST</h6>
                <div>
                    <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="form-control-feedback">
                            <i class="icon-search4"></i>
                        </div>
                    </div>
                </div>
                <div>
                <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_success" id="btn-create"><i class="icon-plus-circle2"></i></button>
                <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled waves-effect waves-light" id="deleteRow" data-target="#modal_theme_danger"><i class="icon-trash"></i></button>
                </div>
            </div>

            <div class="table-responsive">
                @include('invoice_airticket_list.table')
            </div>
        </div>
    </div>
</div>
    

@if($invoices->count() > $invoices->perPage())
    <div class="card card-body py-2 pagination-flat justify-content-center">
        {{ $invoices->links() }}
    </div>
@endif
       
  
<script type="text/javascript" src="{{ URL::asset('js/airticket_list.js') }}"></script>


@stop
