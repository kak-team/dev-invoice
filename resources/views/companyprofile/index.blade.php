@extends('master')
@section('content')
<style>
table#airline td {
    padding: 5px;
}
</style>
        
@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif

<div class="row">
    <form class="col-md-12" enctype="multipart/form-data" method="post" action="{{ action('CompanyProfileController@store') }}">
        @csrf 

    @foreach($values as $value) 
    <input type="hidden" name="company_id" value="{{ $value->id }}"/>

        <div class="modal-body col-md-12">
            <div class="card mb-0">
                    <div class="card-body row">
                        <div class="col">
                            <table class="table table-borderless" id="airline">
                                <tr>
                                    <td>
                                        <p>Company Name in Khmer</p>
                                        <div class="col form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Your company name in Khmer" name="kh_companyname" value="{{ $value->name }}" id="companyname" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <p>Company Name in English</p>
                                        <div class="col form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Your company name in English" name="en_companyname" value="{{ $value->en_name }}" id="companyname" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <p>Registration Number</p>
                                        <div class="col form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Your company vat number" name="registration_number" value="{{ $value->register_number }}" id="companyvat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <p>Vat (%)</p>
                                        <div class="col form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="10" name="vat" id="vat" value="{{ $value->vat }}" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>  
                        </div>
                        <div class="col">
                            <p>Company Logo</p>
                            @if(!empty($value->logo))
                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                    <img src="/pulbic/images/{{ $value->logo }}"/>
                                </div>
                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                    <div class="file-upload-wrapper">
                                        <input type="file" name="images" id="input-file-now" class="file-upload" />
                                    </div>
                                </div>
                            @else
                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                    <div class="file-upload-wrapper">
                                        <input type="file" name="images" id="input-file-now" class="file-upload" />
                                    </div>
                                </div>
                            @endif
                        </div>  
                    </div>
                </div>
        </div>
        <div class="modal-body col-md-12">
            <div class="card mb-0">
                    <div class="card-body">
                        <table class="table table-borderless" id="address">
                            <tr>
                                <td>
                                    <p>Address in Khmer</p>
                                    @forelse($khaddress as $kh_address)
                                    <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                        <div class="p-2">
                                            <input type="hidden" value="{{ $kh_address->id }}" name="khaddress_id"/>
                                            <input type="text" class="form-control" placeholder="ផ្ទះលេខ" name="house_number" value="{{ $kh_address->house_number }}" id="house_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="ផ្លូវ" name="st_number" value="{{ $kh_address->street_number }}" id="st_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>    
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="ឃុំ/សង្កាត់" name="sangkat" value="{{ $kh_address->commune }}" id="sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="ខណ្ឌ" name="khan" value="{{ $kh_address->districk }}" id="sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="ខេត្ត/រាជធានី" name="city" value="{{ $kh_address->province }}" id="city" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                    </div>                                    
                                </td>
                                @empty
                                    <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                            <div class="p-2">
                                                <input type="text" class="form-control" placeholder="ផ្ទះលេខ" name="house_number" id="house_number" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <input type="text" class="form-control" placeholder="ផ្លូវ" name="st_number" id="st_number" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>    
                                            <div class="p-2">
                                                <input type="text" class="form-control" placeholder="ឃុំ/សង្កាត់" name="sangkat"  id="sangkat" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <input type="text" class="form-control" placeholder="ខណ្ឌ" name="khan" id="sangkat" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <input type="text" class="form-control" placeholder="ខេត្ត/រាជធានី" name="city"  id="city" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </td>
                                @endforelse
                            </tr>
                            <tr>    
                                <td>
                                    <p>Address in English</p>
                                    @forelse($enaddress as $en_address)
                                    <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                        <div class="p-2">
                                        <input type="hidden" value="{{ $en_address->id }}" name="enaddress_id"/>
                                            <input type="text" class="form-control" placeholder="House Number" name="en_house_number" value="{{ $en_address->house_number }}" id="en_house_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Street Number" name="en_st_number" value="{{ $en_address->street_number }}" id="en_st_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>    
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Commune/Sangkat" name="en_sangkat" value="{{ $en_address->commune }}" id="en_sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Town/District/Khan" name="en_khan" value="{{ $en_address->districk }}" id="en_sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Province/City" name="en_city" value="{{ $en_address->province }}" id="en_city" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @empty

                                    <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                        <div class="p-2">
                                            
                                            <input type="text" class="form-control" placeholder="House Number" name="en_house_number" id="en_house_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Street Number" name="en_st_number" id="en_st_number" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>    
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Commune/Sangkat" name="en_sangkat"  id="en_sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Town/District/Khan" name="en_khan" id="en_sangkat" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <input type="text" class="form-control" placeholder="Province/City" name="en_city" id="en_city" autocomplete="off" >
                                            <div class="form-control-feedback">
                                                <i class="icon-magazine text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    @endforelse
                                </td>
                            </tr>
                        </table>    
                    </div>
                </div>
        </div>
        <div id="companyprofile">
            <div class="modal-body">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table table-borderless" id="email">
                                    <tr>
                                        <td>
                                            <p>Email</p>
                                            <div class="ml-auto text-right email"><a style="text-decoration: underline;" id="add-more-email">+ ADD MORE ROW</a></div>
                                            @forelse($emails as $email)
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="hidden" value="{{ $email->id }}" name="email_id"/>
                                                <input type="text" class="form-control" placeholder="Email" value="{{ $email->email }}" name="email[]" id="companyemail" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control" placeholder="Email" name="email[]" id="companyemail" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                            @endforelse                                    
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>    
                            </div>
                            <div class="col">
                                <table class="table table-borderless" id="phone">
                                    <tr>
                                        <td>
                                            <p>Phone</p>
                                            <div class="ml-auto text-right phone"><a style="text-decoration: underline;" id="add-more-phone">+ ADD MORE ROW</a></div>
                                            <div class="col form-group form-group-feedback form-group-feedback-left" >
                                                <input type="text" class="form-control" placeholder="Phone" name="phone[]" id="companyphone" autocomplete="off" >
                                                <div class="form-control-feedback">
                                                    <i class="icon-magazine text-muted"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="modal-body">
                <div class="card mb-0">
                        <div class="card-body">
                            <table class="table table-borderless" id="airline">
                                <tr >
                                    <td>
                                        <p>Description</p>
                                        <div class="col form-group form-group-feedback form-group-feedback-left">
                                            <textarea class="form-control" placeholder="Description" name="descritpion" id="descritpion" autocomplete="off" ></textarea >
                                        </div>
                                    </td>
                                </tr>
                            </table>    
                        </div>
                    </div>
            </div>    

            <div class="modal-footer">
                <div class="form-group text-center">
                    <button class="btn btn-danger legitRipple" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
                </div>
            </div>
        </div> 
    @endforeach
    <!--end description-->

    </form>  
</div>
<script>
    $('document').ready(function(){

        //drag and drop file upload
        $('.file-upload').file_upload();


        // add more email row
        var html = '<tr>';
            html += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control" placeholder="Email" name="email[]" id="companyemail" autocomplete="off"><div class="form-control-feedback"><i class="icon-magazine text-muted"></i></div></div></td>';
            html += '<td id="delete"><div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
            html += '</tr>';
        $('#companyprofile').on('click','#add-more-email',function(){
            $('#companyprofile #email').append(html);
        });

        //add more phone
        var phone = '<tr>';
            phone += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control" placeholder="Phone" name="phone[]" id="companyphone" autocomplete="off"><div class="form-control-feedback"><i class="icon-magazine text-muted"></i></div></div></td>';
            phone += '<td id="delete"><div class="md-form m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
            phone += '</tr>';
        $('#companyprofile').on('click','#add-more-phone',function(){
            $('#companyprofile #phone').append(phone);
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

        //delete row
        $('.table').on('click','#delete',function(){
            $(this).parent('tr').remove();
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