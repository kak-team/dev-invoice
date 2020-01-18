@extends('master')
@section('content')
@php $route = explode('.',\Request::route()->getName()); @endphp
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
    .side-bar, .navbar, .page-header, 
    .card, .top-print, .modal-footer{
        display:none
    }
    .modal-dialog.cascading-modal.modal-avatar.modal-lg{
        margin:0!important;
    }
    .print-wrap,.modal-body{
        padding:0px!important;
    }
    .print-footer{
        display:flex;
        align-items:flex-end;
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

<div class="modal fade" id="modalOne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-default blowup" style="width: 190px;" role="document">
        <div class="modal-content modal-background bg-white">
            <div class="md-overlay">
                <div class="text-center d-flex justify-content-center">
                    <img src="{{ URL::asset('images/loading.gif') }}">
                </div>
            </div>
            <div class="modal-body text-center p-0">         
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal_in_modal" id="modalTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-dialog-centered modal-default blowup" style="min-width: 190px;max-width: 190px;" role="document">
      <div class="modal-content modal-background bg-white">
        <div class="md-overlay">
            <div class="text-center d-flex justify-content-center">
                <img src="{{ URL::asset('images/loading.gif') }}">
            </div>
        </div>
        <div class="modal-body text-center p-0">         
            
        </div>

      </div>
      <!--/.Content-->
    </div>
</div>
<div class="card-body p-0">
    <ul class="nav nav-tabs nav-tabs-highlight justify-content-left m-0">
        <li class="nav-item"><a href="#centered-tab1" class="nav-link active" data-toggle="tab">Active</a></li>
        <li class="nav-item"><a href="#centered-tab2" class="nav-link" data-toggle="tab">Search Active</a></li>
        
    </ul>

    <div class="tab-content p-0">
        <div class="tab-pane fade show active" id="centered-tab1">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-2">
                    <h6 class="card-title font-weight-bold text-uppercase"> <i class="icon-users4 pr-2"></i> {{ $route[0] }}</h6>
                    <div>
                        <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="form-control-feedback">
                                <i class="icon-search4"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                    <ul class="list-inline d-sm-flex flex-sm-wrap mb-0">
                        <li class="list-inline-item text-info-800 font-weight-bold text-uppercase p-1 mr-1 border"><a data-toggle="modal" data-target="#modalOne" data-vat="vat"    id="btn-create"><i class="icon-bookmark mr-2"></i>new invoice</a></li>
                        <li class="list-inline-item text-warning-800 font-weight-bold text-uppercase p-1 border"><a data-toggle="modal" data-target="#modalOne" data-vat="no_vat" id="btn-create"><i class="icon-bookmark mr-2"></i>new invoice NO-VAT</a></li>
                        
                    </ul>
                    </div>
                    
                </div>

                <div class="table-responsive">
                    
                    @include($route[0].'.table')
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="centered-tab2">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-2">
                    <h6 class="card-title font-weight-bold text-uppercase"> <i class="icon-users4 pr-2"></i> INVOICE {{$route[0]}}</h6>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><input type="date" class="form-control" id="rangeDemoStart" placeholder="Start date"></p>
                            </div>

                            <div class="col-md-6">
                                <p><input type="date" class="form-control" id="rangeDemoFinish" placeholder="Finish date" disabled="disabled"></p>
                            </div>
                        </div>
                    </div>

                    <div>
                    
                    </div>
                    
                </div>

                <div class="table-responsive">
                   
                </div>
            </div>
        </div>  

    </div>
</div>

    
@if($invoices->total() > $invoices->perPage())
    <div class="card card-body py-2 pagination-flat justify-content-center">
        {{ $invoices->links() }}
    </div>
@endif
       
  

<script type="text/javascript" src="{{ URL::asset('js/default_invoice.js') }}"></script>
@if(in_array($route[0],$servicelist))
    <script type="text/javascript" src="{{ URL::asset('js/'.$route[0].'.js') }}"></script>
@endif

@stop
