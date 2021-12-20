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
                    <span class="text-danger">Hi...</span>
                    <strong>{{ Auth::user()->name }}</strong> welcome To Zongo Online Business
                </h3>
            </div>
        </div>
    </div>
    <!-- /.container --> 
  </div>
@endsection