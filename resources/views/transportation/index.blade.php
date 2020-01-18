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
    max-width: 995px!important;
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
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> TRANSPORTATION LIST</h6>
            <div>
                <div class="form-group form-group-feedback form-group-feedback-right mb-0" style="width:200px">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="form-control-feedback">
                        <i class="icon-search4"></i>
                    </div>
                </div>
            </div>
            <div>
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
                        <td class="text-blue-800 font-weight-bold">Transportation NAME</td>
                        <td class="text-blue-800 font-weight-bold">CONTACT</td>
                        <td class="text-blue-800 font-weight-bold">WEBSITE</td>
                        <td class="text-blue-800 font-weight-bold">ADDRESS</td>
                        <td class="text-blue-800 font-weight-bold">STATUS</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
               
                @if(!$transportations->isEmpty())
                    @foreach($transportations as $transportation)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox" id="btnCheck_single" >
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked{{ $loop->iteration }}" value="{{ $transportation->id }}" name="checkbox">
                                    <label class="custom-control-label" for="defaultUnchecked{{ $loop->iteration }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
                                        <span class="text-icon">{{ $transportation->name_en[0] }}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">{{ $transportation->name_en }}</a>
                                        <div class="text-muted font-size-sm">
                                            Register Numer: {{ $transportation->register_number }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="#" class="text-default font-weight-semibold">{{ $transportation->name_en }}</a>
                                    <div class="text-muted font-size-sm">
                                        Tel : {{ $transportation->phone }}
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-default font-weight-semibold">{{ $transportation->website }}</span></td>
                            <td><span class="text-default font-weight-semibold">{{ $transportation->address }}</span></td>
                            <td>
                                @if( $transportation->status == 1)
                                <a id="btn-status" class="active" data="{{ $transportation->id }}"><span class="badge bg-blue">Active</span></a>
                                @else
                                <a id="btn-status" data="{{ $transportation->id }}"><span class="badge bg-warning">Disabled</span></a>  
                                @endif                              
                                </td>
                            <td><button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1" data-toggle="modal" data-target="#modal_theme_info" id="btn-edit" transportation_id="{{ $transportation->id }}" supplier_id="{{ $transportation->supplier_id }}" company_name="{{ $transportation->name_en }}" register_number="{{ $transportation->register_number }}" website="{{ $transportation->website }}" address="{{ $transportation->address }}" star_rate="{{ $transportation->star_rate }}" description="{{ $transportation->description }}" car_type="{{ $transportation->car_type }}"><i class="icon-quill4"></i></button></td>
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
        @if($transportations->total() > $transportations->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
            {{ $transportations->links() }}
            </div>
        @endif 
    </div>
   
</div>
<script>
    
    $(document).ready(function(){
        $('#rateMe1').mdbRate();
        $('.file-upload').file_upload();
        $('[data-toggle="popover"]').popover();
        

        var html = '<tr>';
            html += '<td><div class="form-group form-group-feedback form-group-feedback-left mb-0"><input type="text" class="form-control" placeholder="Full name" name="fullname[]" id="fullname" required="" autocomplete="off"><div class="form-control-feedback"><i class="icon-user text-muted"></i></div></div></td>';
            html += '<td><div class="form-group form-group-feedback form-group-feedback-left mb-0"><input type="text" class="form-control" placeholder="Phone" name="c_phone[]" id="c_phone" required="" autocomplete="off"><div class="form-control-feedback"><i class="icon-phone-wave text-muted"></i></div></div></td>';
            html += '<td><div class="form-group form-group-feedback form-group-feedback-left mb-0"><input type="text" class="form-control" placeholder="Contact Email" name="c_email[]" id="c_email" required="" autocomplete="off"><div class="form-control-feedback"><i class="icon-envelop4 text-muted"></i></div></div></td>';
            html += '<td class="pb-0 pt-0" id="delete"><div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
            html += '</tr>';

        var hiddenId = new Array();
    
        // Edit
        var g = 1;
        $('.table-responsive').on('click','#btn-edit',function(){
            $('#modal_theme_info #rateMe1').text('');
            var id = $(this).attr('supplier_id');
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

            // star rate            
            var star = $(this).attr('star_rate');
            $('#modal_theme_info #rateMe1').attr('star',star);  
            $('#modal_theme_info #rateMe1').mdbRate();

            // ajax call Transportation_contact
            $('#modal_theme_info #supplier_contact').html('' );
            $.ajax({
                type : 'get',
                url : 'transportation/transportation_contact/'+id,
                success : function (respond){
                    $('#modal_theme_info #supplier_contact').append(respond);    
                }
            });  
            
            var h = g - 1;
            // Tag Input
            $('#cci').html('<div class="chips-initial p-0 mb-0 mt-1"></div>');
            $('#modal_theme_info .chips-initial').materialChip({
                placeholder: 'more...',
                secondaryPlaceholder: '+ Car Type',
                data : jQuery.parseJSON($(this).attr('car_type')),
            });            

            $('.chips').on('chip.add', function(e, chip){
               array = $('.chips-initial').materialChip('data');
               arrString = JSON.stringify(array);
               $('#modal_theme_info #car_type').val(arrString);
            });

            $('.chips').on('chip.delete', function(e, chip){
                array = $('.chips-initial').materialChip('data');
                arrString = JSON.stringify(array);
               $('#modal_theme_info #car_type').val(arrString);
            });

            $('.chips').on('chip.select', function(e, chip){
            // you have the selected chip here
            });
            
            g++;
           
        });

        // get value of star to input
        $('#modal_theme_success,#modal_theme_info').on('click','.fa-star',function(){
            var parent = '#'+$(this).parent().attr('class');
            $(parent+' #star_rate').val($(this).attr('data-index'));
        
        });
        
        // delete Transportation_contact in modal edit
        $("#modal_theme_info").on('click','.delete_oldID',function(){
            var id = $(this).attr('data');            
            hiddenId.push(id);            
            $("#modal_theme_info #TransportationContactDelete").val(hiddenId.toString());
        });

        // create Transportation contact person
        $('#modal_theme_success').on('click','#add-more',function(){
            $('#modal_theme_success #supplier_contact').append(html);           
        });

        // edit Transportation contact person
        $('#modal_theme_info').on('click','#add-more',function(){
            $('#modal_theme_info #supplier_contact').append(html);           
        });

        // status
        $('.table-responsive').on('click','#btn-status',function(){
            var id = $(this).attr('data');
            $.ajax({
                type : 'get',
                url  : 'transportation/update_status/'+id,
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
