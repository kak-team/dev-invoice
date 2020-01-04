<form method="post" action="{{ action('Invoice_airticket_listController@cancel_invoice') }}">
    @csrf
    <input type="hidden" value="{{ $id }}" name="id">
    <div class="modal-header bg-danger p-2 pr-3">
        <h6 class="modal-title">MESSAGE </h6>
        <button type="button" class="close" data-dismiss="modal">×</button>
    </div>

   <div class="modal-body text-center">
        
            <h5 class="mb-0">Cancel invoice number <span class="invoice-number"></span> ?</h5>
            <span class="d-block text-muted">Note: all progress with this invoice will cancel too.</span>
        
        <hr class="col-lg-8">
        <div class="form-group shadow-textarea text-left font-weight-bold">  

            <div class="d-flex justify-content-center">
                <div class="col-lg-10">
                    <label for="exampleFormControlTextarea6 ">Reason Cancel</label>
                    <textarea class="form-control z-depth-1 px-3 " id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..." name="description"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link legitRipple waves-effect waves-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-danger legitRipple waves-effect waves-light">I understand</button>
    </div>
</form>