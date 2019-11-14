<form method="post" action="{{ action('PaymentMethodController@destroy') }}">
    <div class="modal-header bg-danger p-2 pr-3">
        <h6 class="modal-title">MESSAGE </h6>
        <button type="button" class="close" data-dismiss="modal">×</button>
    </div>

    @csrf
    <div class="modal-body text-center">
        <p class="mb-0">
            @php
                $route = explode('.',\Request::route()->getName());
            @endphp
            <i class="icon-trash icon-2x text-danger-800 border-danger-800 border-3 rounded-round p-3 mb-3 mt-1"></i>
            <h5 class="mb-0">Are you sure to delete {{ $route[0] }} <span ></span> ?</h5>
            <span class="d-block text-muted">Note: you can view all list delete in trash</span>
            <input type="hidden" id="spanCheckobxValue" name="id">
        </p>
        <hr class="col-lg-8">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bg-danger legitRipple">I understand</button>
    </div>
</form>