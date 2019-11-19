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
    <form class="col-md-12" enctype="multipart/form-data" method="post" action="{{ action('CompanyProfileController@update') }}">
        @csrf 
        @foreach($values as $value) 
        <input type="hidden" name="company_pro_id" value="{{ $value->id }}"/>
            <div class="modal-body col-md-12">
                <div class="card mb-0">
                        <div class="card-body row">
                            <div class="col">
                                <table class="table table-borderless" id="airline">
                                    <tr>
                                        <td>
                                            <p>Company Name in Khmer</p>
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control pl-0" placeholder="Your company name in Khmer" name="kh_name" value="{{ $value->name }}" id="companyname" autocomplete="off" >
                                                <label for=""></label>
                                            </div>
                                            <p>Company Name in English</p>
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control pl-0" placeholder="Your company name in English" name="en_name" value="{{ $value->en_name }}" id="companyname" autocomplete="off" >
                                                <label for=""></label>
                                            </div>
                                            <p>Registration Number</p>
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control pl-0" placeholder="Your company vat number" name="registration_number" value="{{ $value->register_number }}" id="companyvat" autocomplete="off" >
                                                <label for=""></label>
                                            </div>
                                            <p>Vat (%)</p>
                                            <div class="col form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control pl-0" placeholder="10" name="vat" id="vat" value="{{ $value->vat }}" autocomplete="off" >
                                                <label for=""></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>  
                            </div>
                            <div class="col">
                                <p>Company Logo</p>
                                @if(!empty($value->logo))
                                    <div class="col form-group form-group-feedback form-group-feedback-left">
                                        <div class="file-upload-wrapper">
                                            <input type="file" name="images" data-default-file="{{ URL::asset('/images/'. $value->logo) }}" id="input-file-now" class="file-upload" />
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
                                        @foreach($khaddress as $kh_address)
                                        <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                            <div class="p-1 md-form m-3">
                                                <input type="hidden" value="{{ $kh_address->id }}" name="khaddress_id"/>
                                                <input type="text" class="form-control pl-0" name="kh_house_number" value="{{ $kh_address->house_number }}" id="house_number" autocomplete="off" >
                                                <label for="house_number">ផ្ទះលេខ</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="kh_st_number" value="{{ $kh_address->street_number }}" id="st_number" autocomplete="off" >
                                                <label for="st_number">ផ្លូវលេខ</label>
                                            </div>    
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="kh_sangkat" value="{{ $kh_address->commune }}" id="sangkat" autocomplete="off" >
                                                <label for="sangkat">ឃុំ/សង្កាត់</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="kh_khan" value="{{ $kh_address->districk }}" id="sangkat" autocomplete="off" >
                                                <label for="khan">ខណ្ឌ</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="kh_city" value="{{ $kh_address->province }}" id="city" autocomplete="off" >
                                                <label for="city">ខេត្ត/រាជធានី</label>
                                            </div>
                                        </div>                                    
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>    
                                    <td>
                                        <p>Address in English</p>
                                        @foreach($enaddress as $en_address)
                                        <div class="col d-flex form-group form-group-feedback form-group-feedback-left">
                                            <div class="p-1 md-form m-3">
                                            <input type="hidden" value="{{ $en_address->id }}" name="enaddress_id"/>
                                                <input type="text" class="form-control pl-0" name="en_house_number" value="{{ $en_address->house_number }}" id="en_house_number" autocomplete="off" >
                                                <label for="en_house_number">House Number</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="en_st_number" value="{{ $en_address->street_number }}" id="en_st_number" autocomplete="off" >
                                                <label for="en_st_number">Street Number</label>
                                            </div>    
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="en_sangkat" value="{{ $en_address->commune }}" id="en_sangkat" autocomplete="off" >
                                                <label for="en_sangkat">Commune/Sangkat</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="en_khan" value="{{ $en_address->districk }}" id="en_khan" autocomplete="off" >
                                                <label for="en_khan">Town/District/Khan</label>
                                            </div>
                                            <div class="p-1 md-form m-3">
                                                <input type="text" class="form-control pl-0" name="en_city" value="{{ $en_address->province }}" id="en_city" autocomplete="off" >
                                                <label for="en_city">Province/City</label>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        <p>Email</p>
                                        <div class="ml-auto text-right email small"><a style="text-decoration: underline;" id="add-more-email">+ ADD MORE ROW</a></div>
                                        @foreach($emails as $email)
                                        <tr>
                                            <td>
                                                <div class="col form-group form-group-feedback form-group-feedback-left">
                                                    <input type="hidden" value="{{ $email->id }}" name="email_id[]"/>
                                                    <input type="text" class="form-control pl-0" placeholder="Email" value="{{ $email->email }}" name="email[]" id="companyemail" autocomplete="off" >
                                                </div>                               
                                            </td>
                                            <td>
                                                @if(!$loop->first) 
                                                    <div id="delete" data="{{ $email->id }}" class="md-form m-3 m-0"><i class="icon-minus-circle2 text-danger"></i></div>
                                                @endif
                                            </td>         
                                        </tr>
                                        @endforeach
                                        <input type="hidden" name="d_company_email" id="d_company_email">   
                                    </table>    
                                </div>
                                <div class="col">
                                    <table class="table table-borderless" id="phone">
                                        <p>Phone</p>
                                        <div class="ml-auto text-right phone small"><a style="text-decoration: underline;" id="add-more-phone">+ ADD MORE ROW</a></div>
                                        @forelse($phones as $phone)
                                            <tr>
                                                <td>
                                                    <div class="col form-group form-group-feedback form-group-feedback-left" >
                                                        <input type="hidden" value="{{ $phone->id }}" name="phone_id[]"/>
                                                        <input type="text" class="form-control pl-0" placeholder="Phone" name="phone[]" value="{{ $phone->phone }}" id="companyphone" autocomplete="off" >
                                                    </div>
                                                </td> 
                                                <td>
                                                @if(!$loop->first) 
                                                    <div id="delete" data="{{ $phone->id }}" class="md-form m-3 m-0"><i class="icon-minus-circle2 text-danger"></i></div>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <input type="hidden" name="d_company_phone" id="d_company_phone">
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
                                            <textarea class="form-control pl-0" placeholder="Description" name="descritpion" id="descritpion" autocomplete="off" >{{ $value->description }}</textarea >
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
    $(document).ready(function(){
        var d_company_phone = [];
        var d_company_email = [];

        //drag and drop file upload
        $('.file-upload').file_upload();

        //Delete phone one by one
        $('#phone').on('click','#delete',function(){
            var id = $(this).attr('data');
            d_company_phone.push(id);
            $('#d_company_phone').val(d_company_phone.toString());
            $(this).parents('tr').remove();
        });

        //Delete email one by one
        $('#email').on('click','#delete',function(){
            var id = $(this).attr('data');
            d_company_email.push(id);
            $('#d_company_email').val(d_company_email.toString());
            $(this).parents('tr').remove();
        });

        // add more email row
        var html = '<tr>';
            html += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control pl-0" placeholder="Email" name="n_email[]" id="companyemail" autocomplete="off"></div></td>';
            html += '<td id="delete"><div class="md-form m-3 m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
            html += '</tr>';
        $('#companyprofile').on('click','#add-more-email',function(){
            $('#companyprofile #email').append(html);
        });

        //add more phone
        var phone = '<tr>';
            phone += '<td><div class="col form-group form-group-feedback form-group-feedback-left"><input type="text" class="form-control pl-0" placeholder="Phone" name="n_phone[]" id="companyphone" autocomplete="off"></div></td>';
            phone += '<td id="delete"><div class="md-form m-3 m-0 "><i class="icon-minus-circle2 text-danger"></i></div></td>';
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