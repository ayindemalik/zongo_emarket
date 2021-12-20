@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
           
                 <!-- /.box -->
				 <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->

					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">Admin Name: {{ $adminData->name }}</h3>
            <a href="{{ route('admin.profile.edit') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit profile</a>
					  <h6 class="widget-user-desc">Admin Emain: {{ $adminData->email }}</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path)) ?
             url('uploads/admin_images/'.$adminData->profile_photo_path): url('uploads/no_image.jpg')}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>

				<div class="box">
					<div class="box-body">
						<div class="flexbox align-items-baseline mb-20">
						  <h6 class="text-uppercase ls-2">Friends</h6>
						  <small>20</small>
						</div>
						<div class="gap-items-2 gap-y">
						  <a class="avatar" href="#"><img src="../images/avatar/1.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/3.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/4.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/5.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/6.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/7.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/8.jpg" alt="..."></a>
						  <a class="avatar avatar-more" href="#">+15</a>
						</div>
					</div>
					<div class="box-footer">
						<a class="text-uppercase d-blockls-1 text-fade" href="#">Invite People</a>
					</div>
				</div>

        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection