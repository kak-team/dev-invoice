@extends('master')
@section('content')
<style>
table#airline td {
    padding: 5px;
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
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> Airline LIST</h6>
            <div>
                <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="form-control-feedback">
                        <i class="icon-search4"></i>
                    </div>
                </div>
            </div>
            <div>
            <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_success"><i class="icon-plus-circle2"></i></button>
            <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple disabled" id="deleteRow" data-target="#modal_theme_danger"><i class="icon-trash"></i></button>
            </div>
                   </div>
        <div class="table-responsive">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td>
                            <!-- Default unchecked -->
                            <div class="custom-control custom-checkbox check_false" id="btnCheck_all" >
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                <span class="custom-control-label" for="defaultUnchecked"></span>
                            </div>
                        </td>
                        <td class="text-blue-800 font-weight-bold">AIR LINE NAME</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                    @foreach($values as $value)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox" id="btnCheck_single" >
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked{{ $loop->iteration }}" value="{{ $value->id }}" name="checkbox">
                                    <label class="custom-control-label" for="defaultUnchecked{{ $loop->iteration }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
                                        <span class="text-icon">{{ $value->name[0] }}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">{{ $value->name }}</a>
                                        <div class="text-muted font-size-sm">
                                            Air Line Code: {{ $value->code }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if( $value->status == 1)
                                <a id="btn-status" class="active" data="{{ $value->id }}"><span class="badge bg-blue">Active</span></a>
                                @else
                                <a id="btn-status" data="{{ $value->id }}"><span class="badge bg-warning">Disabled</span></a>  
                                @endif                              
                                </td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="{{ $value->id }}" airline_id="{{ $value->id }}" airline_name="{{ $value->name }}" airline_code="{{ $value->code }}"><i class="icon-quill4"></i></button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
        @if($values->count() > $values->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
                {{ $values->links() }}
            </div>
        @endif
    </div>
   
</div>
<script>
    $('document').ready(function(){

        var html = '<tr>';
            html += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control" placeholder="Airline name" name="airline_name[]" id="airline_name" autocomplete="off"><div class="form-control-feedback"><i class="icon-magazine text-muted"></i></div></div></td>';
            html += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control" placeholder="Airline Code" name="airline_code[]" id="airline_code" autocomplete="off"><div class="form-control-feedback"><i class="icon-user text-muted"></i></div></div></td>';
            html += '<td id="delete"><div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
            html += '</tr>';
        $('#modal_theme_success').on('click','#add-more',function(){
            $('#modal_theme_success #airline').append(html);
        });

        // update status
        $('.table-responsive').on('click','#btn-status',function(){
            var id = $(this).attr('data');
            $.ajax({
                type : 'get',
                url  : 'airline/ajax/'+id,
                success : function(respond){
                    if(respond == 'success'){
                        toastr["success"]("Successfully") ;  
                    }else{
                        toastr["warning"]("Something Problems...") ;  
                    }
                               
                }   
            });
        });

        // delete customer_contact in modal edit
        $("#modal_theme_info").on('click','.delete_oldID',function(){
            var id = $(this).attr('data');            
            hiddenId.push(id);            
            $("#modal_theme_info #customerContactDelete").val(hiddenId.toString());
        });

        // click one-by-one
        $('.table-responsive').on('click','#btnCheck_single',function(){        
            Btndelete();
        });

        $('.table-responsive').on('click', '#btn-edit', function(){
            $(this).each(function() {
                $.each(this.attributes, function() {
                    // this.attributes is not a plain object, but an array
                    // of attribute nodes, which contain both the name and value
                    if(this.specified) {
                    //console.log(this.name, this.value);
                    $('#modal_theme_info #'+this.name).val(this.value);
                    }
                });
            });

        });
    });
</script>
@stop