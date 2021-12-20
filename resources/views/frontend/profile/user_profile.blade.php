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
                    <span class="text-primary">Update your profile </span>
                    <strong>{{ Auth::user()->name }}</strong>
                </h3>

                <div class="card-body">
                    <form method="post" action="{{ route('user.save_profile_update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label>Name</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    <input type="text" class="form-control unicase-form-control" 
                                    value="{{ $user->name }}" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Email Adress</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    <input type="email" class="form-control unicase-form-control" 
                                    value="{{ $user->email }}" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Phone</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    <input type="text" class="form-control unicase-form-control"
                                    value="{{ $user->phone }}"  name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Profile Image</label>
                                    <span >*</span>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                    <input type="file" class="form-control unicase-form-control" 
                                    name="profile_photo_path" id="profile_photo_path">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success"> Save Update</button>
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