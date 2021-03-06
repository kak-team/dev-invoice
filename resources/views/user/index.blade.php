@extends('master')
@section('content')
<div class="modal fade" id="modalOne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-default blowup" style="width: 190px;" role="document">
        <div class="modal-content modal-background bg-white">
            <div class="md-overlay">
                <div class="text-center d-flex justify-content-center">
                    <img src="{{ URL::asset('images/loading.gif') }}">
                </div>
            </div>
            <div class="modal-body text-center p-0">         
                
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif
<div id="modal_theme_success" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form method="POST" action=" {{ action('UserController@create') }}">
                @csrf
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 font-weight-bold">FORM CREATE</h5>
                                <span class="d-block text-muted">Enter your user detail below</span>
                            </div>
                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off">
                                <label for="name"><i class="icon-magazine text-muted"></i> Full Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="off">
                                <label for="username"><i class="icon-user text-muted"></i></i> Username</label>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="off">
                                <label for="email"><i class="icon-envelop4 text-muted"></i> Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" required autocomplete="off" >
                                <label for="password"><i class="icon-lock2 text-muted"></i> Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            <div class="form-group md-form form-group-feedback form-group-feedback-left">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm"><i class="icon-lock2 text-muted"></i> Confirm Password</label>
                                @error('comfirm-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>               

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <div class="row m-0">
                                    <label class="form-check-label mr-3  text-muted">
                                        Choose User Level
                                    </label>
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                                            <input type="radio" class="custom-control-input" id="defaultUnchecked1" value="admin" name="role" checked>
                                            <label class="custom-control-label" for="defaultUnchecked1">Admin</label>
                                        </div>
                                        <input type="hidden" class="custom-control-input" value="vat" name="status" checked>
                                    </div>
                                    <div class="form-check ml-3">
                                    <div class="custom-control custom-checkbox" id="btnCheck_single1">
                                            <input type="radio" class="custom-control-input" id="defaultUnchecked2" value="staff" name="role">
                                            <label class="custom-control-label" for="defaultUnchecked2">Staff</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="modal-footer">
                    <div class="form-group text-center">
                        <button class="btn btn-danger legitRipple" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success legitRipple">Save Change<i class="icon-circle-right2 ml-2"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_theme_danger" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger p-2 pr-3">
                <h6 class="modal-title">MESSAGE </h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-0">
                    <i class="icon-trash icon-2x text-danger-800 border-danger-800 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Are you sure to delete ?</h5>
                    <span class="d-block text-muted">Note: you can view all list delete in trash</span>
                </p>
                <hr class="col-lg-8">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-danger legitRipple">I understand</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header header-elements-sm-inline py-2">
            <h6 class="card-title font-weight-bold"> <i class="icon-users4 pr-2"></i> USER LIST</h6>
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
            </div>
                   </div>
        <div class="table-responsive">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <td>
                            <!-- Default unchecked -->                                
                            <div class="custom-control custom-checkbox check_false" id="btnCheck_all">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                <span class="custom-control-label" for="defaultUnchecked"></span>
                            </div>                            
                        </td>
                        <td class="text-blue-800 font-weight-bold">FULL NAME</td>
                        <td class="text-blue-800 font-weight-bold">USERNAME</td>
                        <td class="text-blue-800 font-weight-bold">LEVEL</td>
                        <td class="text-blue-800 font-weight-bold">EMAIL</td>
                        <td class="text-blue-800 font-weight-bold">SETTING</td>
                    </tr>
                    @foreach($users as $user)                  
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox" id="btnCheck_single">
                                    <input type="checkbox" class="custom-control-input" id="TdefaultUnchecked{{$loop->index}}" value="{{$loop->index}}" name="checkbox">
                                    <label class="custom-control-label" for="TdefaultUnchecked{{$loop->index}}"></label>
                                </div>
                            </td>
                            <td>
                                    <a class="text-default font-weight-semibold">{{ $user->name }}</a>
                            </td>
                            <td>
                                    {{ $user->username }}
                            </td>
                            <td><span class="text-default font-weight-semibold">{{ $user->role }}</span></td>
                            <td><span class="text-default font-weight-semibold">{{ $user->email }}</span></td>
                            <td><a class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" href="" onclick="event.preventDefault();
                                                     document.getElementById('edit-form<?php echo $user->id; ?>').submit();" class="navbar-nav-link waves-effect waves-light"><i class="icon-quill4"></i></a>
                                                     
                                    <button type="button" class="btn btn-outline bg-danger-400 border-danger-400 text-danger-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-delete" value="{{$user->id}}">
                                        <i class="icon-trash"></i>
                                    </button>
                             </td>
                            
						
						<form id="edit-form{{$user->id}}" action="{{'/edit-user'}}" method="get" style="display: none;">
                        @csrf
							<input type="hidden" name="id" value="{{$user->id}}">						
                        </form>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
        @if($users->total() > $users->perPage())
            <div class="card card-body py-2 pagination-flat justify-content-center">
                {{ $users->links() }}
            </div>
        @endif
    </div>
   
</div>
<script>
    $(document).ready(function(){
        // Default vat percent from DB
        vat = $('body').data('vat');

        // Default Root 
        root = $('body').data('link');
        
        // print 
        $('#modal_print').on('click','#print',function(){
            window.print();
        });

        // hidden menu left
        $('.navbar-top').addClass('sidebar-xs');

        // Token CSRF
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        
        // Default Modal id
        parent_private = '#modalOne';
    
        // Edit
        $('.table-responsive').on('click','#btn-edit',function(){
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
            });

            // add checked box by data
            var serviceIdArray = JSON.parse($(this).attr('service_id'));            
            var i;
            for (i = 0; i < serviceIdArray.length; i++) {
                $('#modal_theme_info .v-'+serviceIdArray[i]).addClass('checked');
            }
                
        });


        // Select chekbox service
        $('#modal_theme_success,#modal_theme_info').on('click','#check_service',function(){
            $(this).parent().toggleClass('checked');
        });

        @if ($errors->any())
            $('#modal_theme_success').modal('show');
        @endif

        $('.table-responsive').on('click','#btn-delete',function(){
            id = $(this).val();
           
            $(parent_private+' .md-overlay').show();
            $(parent_private+' .modal-default').removeClass('blowup out');
            $(parent_private+' .modal-body').html('');
            $.ajax({
                type : 'post',
                data : {id : id},
                url  : '/destroy_user',
                success : function(html){                        
                    setTimeout(function(){  
                        $(parent_private+' .md-overlay').hide();
                        $(parent_private+' .modal-default').addClass('blowup');
                        $(parent_private+' .modal-body').html(html);
                    }, 1000);
                },
                error: function () {
                    alert('error path');
                },
            });
        });

       
    });


</script>
@endsection