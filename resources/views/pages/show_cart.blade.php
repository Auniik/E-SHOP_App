@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">

			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Description</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@php
						$contents=Cart::content();
						
					@endphp
					@foreach ($contents as $v_content)
					<tr>
						<td class="cart_product col-md-1">
							<a href=""><img src="{{URL::to($v_content->options->image)}}" height="80px" width="80px" alt=""></a>
						</td>
						<td class="cart_description col-md-4">
							<h4><a href="">{{$v_content->name}}</a></h4>
							<p>Product ID:{{$v_content->id}}</p>
						</td>
						<td class="cart_price col-md-2">
							<p>{{$v_content->price}}/-</p>
						</td>
						<td class="cart_quantity col-md-2">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart')}}" method="Get">
									<input class="cart_quantity_input" style="height:30px; width:60px" type="number" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$v_content->rowId}}">
									<input type="submit" class="cart_quantity_down btn btn-sm btn-default" value=" + ">
								</form>
							</div>
						</td>
						<td class="cart_total col-md-2">
							<p class="cart_total_price">{{$v_content->total}}/-</p>
						</td>
						<td class="cart_delete col-md-1">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			{{-- <div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div> --}}
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
						<li>Eco Tax <span>{{Cart::tax()}}</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{Cart::total()}}</span></li>
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

<footer id="footer"><!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
						<h2><span>e</span>-shopper</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe1.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe2.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe3.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe4.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="images/home/map.png" alt="" />
						<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop