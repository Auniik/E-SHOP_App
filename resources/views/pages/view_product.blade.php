@extends('layout')
@section('aside')
    @include('aside')
@endsection
@section('content')
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{URL::to($view_product->product_image)}}" alt="" />
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
			    <div class="carousel-inner">
					<div class="item active">
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
					</div>
					
				</div>

			  <!-- Controls -->
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
		</div>
					<?php

						$content_qty=Session::get('content_qty');
						

					?>
					
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
			<h2>{{$view_product->product_name}}</h2>
			<p>PRODUCT ID: {{$view_product->product_id}}</p>
			<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
			<span>
				<span>{{$view_product->product_price}} TK</span>
				<form class="container" method="post" action="{{URL::to('/add-to-cart')}}">
					@csrf
					<label>Quantity:</label>
					{{-- @if($view_product->available_product-$content_qty==0) --}}
					<input type="number" name="qty" value="1" min="1" max="{{$view_product->available_product}}" />
					{{-- @elseif($view_product->available_product-$content_qty)
					<input type="number" name="qty" value="1" min="1" max="{{$view_product->available_product-$content_qty}}" />
					@endif --}}
					<input type="hidden" value="{{$view_product->product_id}}" name="product_id" />

					@if($view_product->available_product-$content_qty==0)
					<button type="submit"  class="btn btn-fefault cart" disabled="">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					@else
					<button type="submit"  class="btn btn-fefault cart" >
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					@endif
				</form>
				
			</span>
			@if($view_product->available_product==0)
				<p><b>Availability:</b> <span style="color:tomato; font-size:110%">Out of Stock</span></p>
			@else
			<p><b>Availability:</b> {{$view_product->available_product}} Piece</p>
			@endif
			<p><b>Condition:</b> New</p>
			<p><b>Brand:</b> {{$view_product->manufacture_name}}</p>
			<a href=""><img src="{{URL::to('frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li><a href="#details" data-toggle="tab">Details</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
			<li><a href="#tag" data-toggle="tab">Tag</a></li>
			<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade" id="details" >
			<div class="col-sm-5">
				<p><b>Product Description:</b></p>{{$view_product->product_long_description}}
			</div>
		</div>
			
		
		<div class="tab-pane fade" id="companyprofile" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery1.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery3.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery2.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery4.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tab-pane fade" id="tag" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery1.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery2.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery3.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('frontend/images/home/gallery4.jpg')}}" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->
@endsection