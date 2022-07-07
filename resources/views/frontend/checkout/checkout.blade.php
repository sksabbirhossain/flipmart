@extends('frontend.layouts.main')
@section('title', 'FlipMart | Checkout Page')
@section('main-content')


<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">Ckeckout Page</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Billing Address</h3>
                                <form action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                        <input type="text" id="fname" name="name" class="form-control" placeholder="John M. Doe">
                                        <strong class="text-danger">@error('name') {{$message}} @enderror</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="john@example.com">
                                        <strong class="text-danger">@error('email') {{$message}} @enderror</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-mobile"></i> Phone Number</label>
                                        <input type="number" id="email" name="phone" class="form-control" placeholder="01*********">
                                        <strong class="text-danger">@error('phone') {{$message}} @enderror</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                        <input type="text" id="adr" name="address" class="form-control" placeholder="542 W. 15th Street">
                                        <strong class="text-danger">@error('address') {{$message}} @enderror</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><i class="fa fa-institution"></i> City</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="New York">
                                        <strong class="text-danger">@error('city') {{$message}} @enderror</strong>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" placeholder="NY">

                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" class="form-control" placeholder="10001">     
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-block">CheckOut</button>
                                    </div>
                                </form>        
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        @foreach ( Cart::getContent() as $cart)
                                        <tr>
                                            <td class="col-md-5"><img src="{{ asset('uploads/productImages/'.$cart->attributes->image) }}" alt="imga" style="border-radius: 50%; height:50px; object-fit: cover; width: 50px"></td>
                                            <td class="col-md-7">
                                                <div class="product-name"><a href="#">{{ $cart->name }}</a></div>
                                            </td>
                                            <td>
                                                <div class="price">{{ $cart->quantity }}</div>
                                            </td>
                                            <td>
                                                <div class="price">${{ $cart->price }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h5 style="text-align: end">SubTotal: <strong>${{Cart::getSubTotal()}}</strong> </h5>
                            </div>
                        </div>
                    </div>
                </div>		
	        </div><!-- /.row -->
		</div>
    </div>
</div>

@endsection