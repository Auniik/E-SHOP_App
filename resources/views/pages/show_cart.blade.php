@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{URL::to('/')}}">Home</a></li>
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
						<?php 
								$published_product=DB::table('tbl_products')
									->where('product_id',$v_content->id)
									->get();
									Session::put('content_qty', $v_content->qty);
								foreach ($published_product as $v_product) {
								
						?>
						<td class="cart_product col-md-1">
							<a href="{{URL::to('/view-product/'.$v_product->product_id)}}"><img src="{{URL::to($v_content->options->image)}}" height="80px" width="80px" alt=""></a>
						</td>
						<td class="cart_description col-md-4">
							<h4><a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_content->name}}</a></h4>
							<p>Product ID:{{$v_content->id}}</p>
						</td>
						<td class="cart_price col-md-2">
							<p>{{$v_content->price}}/-</p>
						</td>
							
						<td class="cart_quantity col-md-2">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart')}}" method="Get">
									
									<input class="cart_quantity_input" style="height:30px; width:45px" type="number" name="qty" min="0" max="{{$v_product->available_product}}" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<?php
									
								}
						?>
									<input type="hidden" name="rowId" value="{{$v_content->rowId}}">
									<input type="submit" class="cart_quantity_down btn btn-sm btn-default" value="+">
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
	<div class="container  col-md-offset-3">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
						<li>Eco Tax <span>{{Cart::tax()}}</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{Cart::total()}}</span></li>
					</ul>
						{{-- <a class="btn btn-default update" href="">Update</a> --}}
						@php
                            $customer_id=Session::get('customer_id');
                        @endphp

                        @if($customer_id != null)
						<a class="btn btn-default update" href="{{URL::to('/checkout')}}">Check Out</a>
						@else
						<a class="btn btn-default update" href="{{URL::to('/login-check')}}">Check Out</a>
						@endif
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->


@stop