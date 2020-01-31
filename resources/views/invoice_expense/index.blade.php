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
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td class="text-blue-800 font-weight-bold">Invoice ID</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Expense</td>
                        <td class="text-blue-800 font-weight-bold">Expense Price</td>
                        <td class="text-blue-800 font-weight-bold">Invoice Type</td>
                        <td class="text-blue-800 font-weight-bold">Expense Date</td>
                        <td class="text-blue-800 font-weight-bold">Setting</td>
                    </tr>
                    @foreach($values as $value)
                        <tr>
                            <td>
                            {{ $value->invoice->invoice_number }}
                            </td>
                            <td>                        
                                {{ $value->invoice_expense_id }}
                            </td>
                            <td>
                                {{ $value->expense_price }}
                            </td>
                            <td>
                                {{ $value->invoice->service_type[0]->name }}
                            </td>
                            <td>
                                {{ date('d/m/Y',strtotime($value->issue_date)) }}
                            </td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="{{ $value->id }}" airline_id="{{ $value->id }}" airline_name="{{ $value->name }}" airline_code="{{ $value->code }}"><i class="icon-quill4"></i></button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                $(parent_private+' .span_invoice_exspense').text(obj.span_invoice_exspense == undefined ? '' : obj.span_invoice_exspense);
                $(parent_private+' .span_invoice_date').text(obj.span_invoice_date == undefined ? '' : obj.span_invoice_date);
                $(parent_private+' .messenge-alert').text(obj.alert == undefined ? '' : obj.alert);
                
             }
           });
        });
    });
</script>
@stop