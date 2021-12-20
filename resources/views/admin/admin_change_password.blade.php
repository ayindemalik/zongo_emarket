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
                        <h4 class="box-title">Admin Change Password</h4>
                      </div>
                      <div class="box-body">
                        <form method="post" action="{{ route('admin.update.password') }}" >
                            @csrf    
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-6">
                                        <label>Current Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="password" id= "old_password" name= "old_password" class="form-control"  name="name" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>New Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password" value="">
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-6">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="password" class="form-control"  id="password_confirmation"  name="password_confirmation" value="">
                                        </div>
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


@endsection