@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{URL::to('/')}}">Home</a></li>
			  <li class="active">Wishlist</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">

			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Description</td>
						<td class="price">Price</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@php
						$wishlist=Cart::instance('wishlist')->content();
					@endphp

					@foreach ($wishlist as $v_wishlist)
					<tr>
						<?php 
								$published_product=DB::table('tbl_products')
									->where('product_id',$v_wishlist->id)
									->get();
									Session::put('content_qty', $v_wishlist->qty);
								foreach ($published_product as $v_product) {
								
						?>
						<td class="cart_product col-md-1">
							<a href=""><img src="{{URL::to($v_wishlist->options->image)}}" height="80px" width="80px" alt=""></a>
						</td>
						<td class="cart_description col-md-4">
							<h4><a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_wishlist->name}}</a></h4>
						<?php
							}
						?>
							<p>Product ID:{{$v_wishlist->id}}</p>
						</td>
						<input type="hidden" name="rowId" value="{{$v_wishlist->rowId}}">
						<td class="cart_price col-md-2">
							<p>{{$v_wishlist->price}}/-</p>
						</td>
						
						<td class="cart_delete col-md-1">

							<a class="cart_quantity_delete" href="{{URL::to('/delete-wishlist/'.$v_wishlist->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->


	


@stop