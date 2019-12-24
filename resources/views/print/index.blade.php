@extends('master')
@section('content')

<h1>Hello</h1>
<button type="button" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modal_theme_success" id="btn-edit"><i class="icon-printer2"></i></button>

<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static"  >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @include('print.invoiceprint')
        </div>
    </div>
</div>

@stop