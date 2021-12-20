@extends('frontend.main_master')

@section('content')
<div class="body-content" >
    <div class="container">
        <div class="row">
            <div class="col-md-2 p-5">
                <br>
                <img class="card-img-top py-5" src="{{ (!empty($user->profile_photo_path)) ?
                    url('uploads/user_images/'.$user->profile_photo_path): url('uploads/no_image.jpg')}}" 
                    alt="User Avatar" style="border-radius: 50%" height="100%" width="100%" id="showImage">
                    <ul class="list-group list-group-flush "><br>
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.update_profile') }}" class="btn btn-primary btn-sm btn-block">Update Profile </a>
                        <a href="{{ route('user.change_password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>  
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-6">
                <h3 class="text-center">
                    <span class="text-primary">Change your password </span>
                    <strong>{{ Auth::user()->name }}</strong>
                </h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.change_password_update') }}">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label>Current Password</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    <input type="password" class="form-control unicase-form-control" 
                                     name="old_password" id="current_password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>New Password</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    <input type="password" class="form-control unicase-form-control" 
                                     name="pass" id="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Confirm Password </label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    <input type="password" class="form-control unicase-form-control"
                                      name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                               

                                <div class="col-12 mt-10">
                                    <button type="submit" class="btn btn-success"> Save Changes</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>
    </div>
    <!-- /.container --> 
  </div>
@endsection