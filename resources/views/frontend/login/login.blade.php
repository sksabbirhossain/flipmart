@extends('frontend.layouts.main')
@section('title', 'FlipMart | Category by Products')
@section('main-content')


<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6  sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>
                    <form action="{{ route('user.login.check') }}" method="POST" class="register-form outer-top-xs" role="form" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <strong class="text-danger">@error('email') {{$message}} @enderror</strong>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            <strong class="text-danger">@error('password') {{$message}} @enderror</strong>
                        </div>
                        <div class="radio outer-xs">
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                            <a href="{{ route('user.signup') }}" class="pull-right">Create Account</a>
                        </div>
                        
                    </form>					
                </div>
                <!-- Sign-in -->
<!-- create a new account -->
		    </div><!-- /.row -->
		</div><!-- /.sigin-in-->
    </div>
</div>

@endsection