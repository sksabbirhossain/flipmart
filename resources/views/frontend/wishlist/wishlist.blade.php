@extends('frontend.layouts.main')
@section('title', 'FlipMart | Wishlist')
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
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( Cart::getContent() as $cart)
                                <tr>
                                    <td class="col-md-2"><img src="{{ asset('uploads/productImages/'.$cart->attributes->image) }}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">{{ $cart->name }}</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                        <div class="price">
                                            ${{ $cart->price }}
                                            <span>$900.00</span>
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a href="#" class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>		
	        </div><!-- /.row -->
		</div>
    </div>
</div>
@endsection