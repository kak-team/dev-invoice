@extends('master')
@section('content')
<style>
table#airline td {
    padding: 5px;
}
</style>

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
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> Out Going Expense</h6>
            <div>
                <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="form-control-feedback">
                        <i class="icon-search4"></i>
                    </div>
                </div>
            </div>
            <div>
            <button type="button" id="btn-create" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modalOne"><i class="icon-plus-circle2"></i></button>
            </div>
                   </div>
        <div class="table-responsive">
                @if(auth()->user()->status == 'vat')
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td class="text-blue-800 font-weight-bold">Invoice ID</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Expense</td>
                        <td class="text-blue-800 font-weight-bold">Expense Price</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Type</td>
                        <td class="text-blue-800 font-weight-bold">Setting</td>
                    </tr>
                    @foreach($values as $value)
                        @if($value->invoice->status_vat == 'vat')
                        <tr>
                            <td class="font-weight-bold">
                                {{ $value->invoice->invoice_number }}
                                <p class="m-0">{{ $value->invoice->service_type[0]->name }}</p>
                            </td>
                            <td class="font-weight-bold">                        
                                {{ $value->invoice_expense_id }}
                                <p class="m-0">Collect By : {{ $value->collect_by }}</p>
                            </td>
                            <td class="text-danger font-weight-bold">
                                USD -{{ number_format($value->exspense_price_vat,2) }} 
                            </td>
                            
                            <td>
                                {{ date('d/m/Y',strtotime($value->issue_date)) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-delete" value="4">
                                <i class="icon-trash"></i>
                            </button>    
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                @else
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td class="text-blue-800 font-weight-bold">Invoice ID</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Expense</td>
                        <td class="text-blue-800 font-weight-bold">Expense Price</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Type</td>
                        <td class="text-blue-800 font-weight-bold">Setting</td>
                    </tr>
                    @foreach($values as $value)
                        <tr>
                            <td class="font-weight-bold">
                                {{ $value->invoice->invoice_number }}
                                <p class="m-0">{{ $value->invoice->service_type[0]->name }}</p>
                            </td>
                            <td class="font-weight-bold">                        
                                {{ $value->invoice_expense_id }}
                                <p class="m-0">Collect By : {{ $value->collect_by }}</p>
                            </td>
                            <td class="text-danger font-weight-bold">
                                USD -{{ number_format($value->exspense_price_no_vat,2) }} 
                            </td>
                            
                            <td>
                                {{ date('d/m/Y',strtotime($value->issue_date)) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-delete" value="4">
                                <i class="icon-trash"></i>
                            </button>    
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        
        </div>
        @if($values->total() > $values->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
                {{ $values->links() }}
            </div>
        @endif
    </div>
   
</div>
<script>
    $(document).ready(function(){
    
        // Default vat percent from DB
        vat = $('body').data('vat');

        // Default Root 
        root = $('body').data('link');
        
        // print 
        $('#modal_print').on('click','#print',function(){
            window.print();
        });

        // hidden menu left
        $('.navbar-top').addClass('sidebar-xs');

        // Token CSRF
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        
        // Default Modal id
        parent_private = '#modalOne';

        // Modal in Modal Fix overflow
        $('.modal').on('click','.modal_fix_overflow',function(){
            $('body').addClass('modal-open1');
        });

        // btn create invoice
        $('.card').on('click','#btn-create',function(){

            parent_private = $(this).data('target');
            $(parent_private+' .md-overlay').show();
            $(parent_private+' .modal-default').removeClass('blowup out');
            $(parent_private+' .modal-body').html('');
           
            $.ajax({
                type : 'post',
                url : 'expense/form_create',
                success : function(respond){
                    setTimeout(function(){             
                        $(parent_private+' .md-overlay').hide();
                        $(parent_private+' .modal-default').addClass('blowup');
                        $(parent_private+' .modal-body').html(respond);
                        $('#modalOne #payment_method').materialSelect();
                        
                        App.initCardActions();
                    }, 1000);
                }
            });
        });

        // auto invoice_number
        $(parent_private).on('keyup','#invoice_number',function(){
            invoice_number = $(this).val();
           $.ajax({
             type : 'post',
             data : { invoice_number : invoice_number },
             url  : 'expense/auto_invoice_number',
             success : function(respond){
                //$(parent_private+' .test').html(respond);
                obj = jQuery.parseJSON(respond);
                $(parent_private+' .span_supplier_name').text( (obj.span_supplier_name == undefined ? '' : obj.span_supplier_name ) );
                $(parent_private+' .span_invoice_type').text(obj.span_invoice_type == undefined ? '' : obj.span_invoice_type);
                $(parent_private+' .span_invoice_amount').text(obj.span_invoice_amount == undefined ? '' : obj.span_invoice_amount);
                $(parent_private+' .span_invoice_serviceFee').text(obj.span_invoice_serviceFee == undefined ? '' : obj.span_invoice_serviceFee);
                $(parent_private+' .span_invoice_totalVat').text(obj.span_invoice_totalVat == undefined ? '' : obj.span_invoice_totalVat);
                $(parent_private+' .span_invoice_exspense').text(obj.span_invoice_exspense == undefined ? '' : obj.span_invoice_exspense);
                $(parent_private+' #value_exspense_vat').val(obj.value_exspense_vat == undefined ? '' : obj.value_exspense_vat);
                $(parent_private+' #value_exspense_no_vat').val(obj.value_exspense_no_vat == undefined ? '' : obj.value_exspense_no_vat);
                $(parent_private+' .expense').val(obj.span_invoice_exspense == undefined ? '' : obj.span_invoice_exspense);
                $(parent_private+' .span_invoice_date').text(obj.span_invoice_date == undefined ? '' : obj.span_invoice_date);
                $(parent_private+' .messenge-alert').text(obj.alert == undefined ? '' : obj.alert);
                
             }
           });
        });

        $('.table-responsive').on('click','#btn-delete',function(){
            id = $(this).val();
            $(parent_private+' .md-overlay').show();
            $(parent_private+' .modal-default').removeClass('blowup out');
            $(parent_private+' .modal-body').html('');
            $.ajax({
                type : 'post',
                url  : 'expense/form_delete',
                sucess : function(respond){
                    setTimeout(function(){  
                        $(parent_private+' .md-overlay').hide();
                        $(parent_private+' .modal-default').addClass('blowup');
                        $(parent_private+' #expense_id').val(id);
                        $(parent_private+' .modal-body').html(respond);
                    }, 1000);
                }
            });
        });
    });
</script>
@stop