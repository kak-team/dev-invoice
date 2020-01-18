<style>
#modalTwo .modal-default{max-width: 110px!important;min-width: 40%!important;}
</style>
<form method="post" action="{{ action('InvoiceController@exe_form_delete_payment') }}">
    @csrf
    <input type="hidden" value="{{ $payment_list_id }}" name="payment_list_id">
    <div class="bg-danger p-2 pr-3">
        <h6 class="modal-title">MESSAGE </h6>
    </div>
     
    
    <div class="modal-body text-center">
        <p class="mb-0">
            <i class="icon-trash icon-2x text-danger-800 border-danger-800 border-3 rounded-round p-3 mb-3 mt-1"></i>
            </p><h5 class="mb-0">Are you sure to delete this record <span></span> ?</h5>
                <span class="d-block text-muted">Note: the invoice-payment will be calculating again.  </span>
            <p>
        </p>
        <hr class="col-lg-8">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link legitRipple waves-effect waves-light modal_fix_overflow btn-close" data-dismiss="modal" data-modal="#modalTwo">Cancel</button>
        <button type="submit" class="btn bg-danger legitRipple waves-effect waves-light">I understand</button>
    </div>
    
</form>