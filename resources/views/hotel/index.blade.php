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
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> HOTEL LIST</h6>
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
                        <td class="text-blue-800 font-weight-bold">hotel NAME</td>
                        <td class="text-blue-800 font-weight-bold">CONTACT</td>
                        <td class="text-blue-800 font-weight-bold">WEBSITE</td>
                        <td class="text-blue-800 font-weight-bold">ADDRESS</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
               
                @if(!$hotels->isEmpty())
                    @foreach($hotels as $hotel)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox" id="btnCheck_single" >
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked{{ $loop->iteration }}" value="{{ $hotel->id }}" name="checkbox">
                                    <label class="custom-control-label" for="defaultUnchecked{{ $loop->iteration }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
                                        <span class="text-icon">{{ $hotel->supplier_name[0] }}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">{{ $hotel->supplier_name }}</a>
                                        <div class="text-muted font-size-sm">
                                            Register Numer: {{ $hotel->register_number }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="#" class="text-default font-weight-semibold">{{ $hotel->supplier_name }}</a>
                                    <div class="text-muted font-size-sm">
                                        Tel : {{ $hotel->phone }}
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-default font-weight-semibold">{{ $hotel->website }}</span></td>
                            <td><span class="text-default font-weight-semibold">{{ $hotel->address }}</span></td>
                            <td>
                                @if( $hotel->status == 1)
                                <a id="btn-status" class="active" data="{{ $hotel->id }}"><span class="badge bg-blue">Active</span></a>
                                @else
                                <a id="btn-status" data="{{ $hotel->id }}"><span class="badge bg-warning">Disabled</span></a>  
                                @endif                              
                                </td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" value="{{ $hotel->id }}" company_name="{{ $hotel->supplier_name }}" register_number="{{ $hotel->register_number }}" website="{{ $hotel->website }}" address="{{ $hotel->address }}" value="1"><i class="icon-quill4"></i></button></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=7 class="text-center p-5">No Data...</td>
                    </tr>
                @endif 
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="card card-body py-2 pagination-flat justify-content-center">
        {{ $hotels->links() }}
        </div>
    </div>
   
</div>
<script>
    
    $(document).ready(function(){
        $('#rateMe1').mdbRate();
        $('.file-upload').file_upload();
        $('[data-toggle="popover"]').popover();

        var hiddenId = new Array();
    
        // Edit
        $('.table-responsive').on('click','#btn-edit',function(){
            var id = $(this).val();
            hiddenId = new Array();
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

            // remove checked box first
            $("#modal_theme_info").each(function(){
                $('#modal_theme_info .span-checkbox').removeClass('checked');
                $('#modal_theme_info #check_service').prop('checked', false);                
            });

            // add checked box by data
            var serviceIdArray = JSON.parse($(this).attr('service_id'));            
            var i;
            for (i = 0; i < serviceIdArray.length; i++) {
                $('#modal_theme_info .v-'+serviceIdArray[i]).addClass('checked');
                $('#modal_theme_info .v-'+serviceIdArray[i]+' #check_service').prop('checked', true);
            }

            $("#modal_theme_info #hotelContactDelete").val('');

            // ajax call hotel_contact
            $('#modal_theme_info #airline').html('' );
            $.ajax({
                type : 'get',
                url : 'hotel/hotel_contact/'+id,
                success : function (respond){
                    $('#modal_theme_info #hotel_id').val(id);
                    $('#modal_theme_info #airline').append(respond);    
                }
            });
                
        });
        
        // delete hotel_contact in modal edit
        $("#modal_theme_info").on('click','.delete_oldID',function(){
            var id = $(this).attr('data');            
            hiddenId.push(id);            
            $("#modal_theme_info #hotelContactDelete").val(hiddenId.toString());
        });

        // Select chekbox service
        $('#modal_theme_success,#modal_theme_info').on('click','#check_service',function(){
            $(this).parent().toggleClass('checked');
        });

        // create hotel contact person
        $('#modal_theme_success').on('click','#add-more',function(){
            $('#modal_theme_success #airline').append(html);           
        });

        // edit hotel contact person
        $('#modal_theme_info').on('click','#add-more',function(){
            $('#modal_theme_info #airline').append(html);           
        });

        // status
        $('.table-responsive').on('click','#btn-status',function(){
            var id = $(this).attr('data');
            $.ajax({
                type : 'get',
                url  : 'hotel/ajax/'+id,
                success : function(respond){
                    if(respond == 'success'){
                        toastr["success"]("Successfully") ;  
                    }else{
                        toastr["warning"]("Something Problems...") ;  
                    }
                               
                }   
            });
        });

        // click one-by-one
        $('.table-responsive').on('click','#btnCheck_single',function(){        
            Btndelete();
        });
        

        
    
    });


</script>

@stop