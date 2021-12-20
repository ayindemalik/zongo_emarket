@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <!-- Main content -->
		<section class="content">

            <div class="row">
  
              <div class="col-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h4 class="box-title">Admin Profile Edit</h4>
                      </div>
                      <div class="box-body">
                        <form method="post" action="{{ route('admin.profile.store_update') }}" enctype="multipart/form-data">
                            @csrf    
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-6">
                                        <label>Admin Name:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control"  name="name" value="{{ $aditData->name }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-6">
                                    <!-- Date mm/dd/yyyy -->
                                    <label>Admin Email:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="text" class="form-control" name="email" value="{{ $aditData->email }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                        <input type="file" class="form-control" name="profile_photo_path" id="profileImage">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-6">
                                        <img class="" src="{{ (!empty($editData->profile_photo_path)) ?
                                            url('uploads/admin_images/'.$editData->profile_photo_path): url('uploads/no_image.jpg')}}" 
                                            alt="User Avatar" style="width=100px; height:100px;" id="showImage">
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="bt btn-primary btn-rounded mb-5" value="Update">
                            </div>
                        </form>
                      </div>
                  				
                </div>
                <!-- /.box -->
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#profileImage').change(function(ev){
            var reader = new FileReader();
            reader.onload = function(ev){
                $('#showImage').attr('src', ev.target.result);
            }
            reader.readAsDataURL(ev.target.files['0']);
        });
    });

  </script>

@endsection