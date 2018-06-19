@extends('admin_layout')
@section('title', 'All Products')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/all-product')}}">All Product</a></li>
</ul>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>ID</th>
					  <th>Product Image</th>
					  <th>Product Name</th>
					  <th>Category</th>
					  <th>Price</th>
					  <th>Size</th>
					  <th>Color</th>
					  <th>Status</th>

					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
				@foreach($all_product_info as $v_product)
				<tr>
					<td></td>
					<td class="center">{{$v_product->product_image}}</td>
					<td class="center">{{$v_product->product_name}}</</td>
					<td class="center">...</</td>
					<td class="center">{{$v_product->product_price}}</</td>
					<td class="center">{{$v_product->product_size}}</</td>
					<td class="center">{{$v_product->product_color}}</</td>
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
					<td class="center">
						<a class="btn btn-default" href="#">
							<i class="halflings-icon white zoom-in"></i>  
						</a>
						<a class="btn btn-info" href="#">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection