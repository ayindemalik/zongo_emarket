@extends('frontend.main_master')

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Reset Password</h4>
                   
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf 
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input id="email" type="email" name="email" required class="form-control unicase-form-control text-input"  >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input id="password" type="password"
                            name="password" required class="form-control unicase-form-control text-input"  >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">Password <span>*</span></label>
                            <input id="password_confirmation" type="password"
                            name="password_confirmation" required class="form-control unicase-form-control text-input"  >
                        </div>
                    
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                    </form>					
                </div>
                <!-- Sign-in -->
    		</div><!-- /.row -->
		</div><!-- /.sigin-in-->
    
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
            <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
</div><!-- /.body-content -->
      
    
     
@endsection