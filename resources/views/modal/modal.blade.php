@php
    $route = explode('.',\Request::route()->getName());
@endphp
<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static"  >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           @include($route[0].'.create')
        </div>
    </div>
</div>
<div id="modal_theme_info" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        @include($route[0].'.edit')
        </div>
    </div>
</div>

<div id="modal_theme_danger" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        @include($route[0].'.delete')
        </div>
    </div>
</div>