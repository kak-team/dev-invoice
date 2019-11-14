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

@include('modal.modal')
@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif

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
                <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_success"><i class="icon-plus-circle2"></i></button>
                <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled waves-effect waves-light" id="deleteRow" data-target="#modal_theme_danger"><i class="icon-trash"></i></button>
                </div>
            </div>

            <div class="table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr class="table-active table-border-double">
                    <td>
                        <!-- Default unchecked -->
                        
                    <div class="custom-control custom-checkbox check_false" id="btnCheck_all" >
                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                        <span class="custom-control-label" for="defaultUnchecked"></span>
                    </div>
                        
                    </td>
                    <td class="text-blue-800 font-weight-bold">ID</td>
                    <td class="text-blue-800 font-weight-bold">ISSUED TO</td>
                    <td class="text-blue-800 font-weight-bold">STAUTS</td>
                    <td class="text-blue-800 font-weight-bold">ISSUE DATE</td>
                    <td class="text-blue-800 font-weight-bold">DUE DATE</td>
                    <td class="text-blue-800 font-weight-bold">AMOUNT</td>
                    <td class="text-blue-800 font-weight-bold">SETTING</td>
                </tr>
            
            @if(!$invoices->isEmpty())
                
            @else
            <tr role="row" class="odd">
            <td>
                            <div class="custom-control custom-checkbox" id="btnCheck_single">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="4" name="checkbox">
                                <label class="custom-control-label" for="defaultUnchecked1"></label>
                            </div>
                        </td>
                            <td class="sorting_1">#0025</td>
                            
                            <td>
                                <h6 class="mb-0">
                                    <a href="#">Rebecca Manes</a>
                                    <span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
                                </h6>
                            </td>
                            <td>
                                <select name="status" class="form-control form-control-select2" data-placeholder="Select status">
                                    <option value="overdue">Overdue</option>
                                    <option value="hold" selected="">On hold</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="invalid">Invalid</option>
                                    <option value="cancel">Canceled</option>
                                </select>
                            </td>
                            <td>
                                April 18, 2015
                            </td>
                            <td>
                                <span class="badge badge-success">Paid on Mar 16, 2015</span>
                            </td>
                            <td>
                                <h6 class="mb-0 font-weight-bold">$17,890 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span></h6>
                            </td>
                            <td class="text-center">
                                <div class="list-icons list-icons-extended">
                                    <a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
                                            <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
                                            <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <tr>
                    <td colspan=8 class="text-center p-5">No Data...</td>
                </tr>
            @endif 
                </tbody>
            </table>
        </div>
    
    </div>



        </div>
    </div>
    

        @if($invoices->count() > $invoices->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
                {{ $invoices->links() }}
            </div>
        @endif
       
    </div>
   
</div>
<script>
    
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
        $('.mdb-select').materialSelect();
    });


</script>

@stop
