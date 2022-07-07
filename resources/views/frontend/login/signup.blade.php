@extends('frontend.layouts.main')
@section('title', 'FlipMart | Create User Page')
@section('main-content')


<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>
                    <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data" class="register-form outer-top-xs" role="form" >
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <strong class="text-danger">@error('name') {{$message}} @enderror</strong>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
                            <strong class="text-danger">@error('email') {{$message}} @enderror</strong>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Image <span>*</span></label>
                            <input type="file" name="image" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <strong class="text-danger">@error('image') {{$message}} @enderror</strong>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <strong class="text-danger">@error('password') {{$message}} @enderror</strong>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            <input type="password" name="cPassword" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <strong class="text-danger">@error('cPassword') {{$message}} @enderror</strong>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>
                </div>	
<!-- create a new account -->
		    </div><!-- /.row -->
		</div><!-- /.sigin-in-->
    </div>
</div>

@endsection