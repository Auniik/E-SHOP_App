@extends('admin_layout')
@section('title', 'Edit Product')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/edit-manufacture')}}">Edit Product</a></li>
</ul>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{URL::to('/update-product/'.$productInfo->product_id)}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Product Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="focusedInput" type="text" value="{{$productInfo->product_name}}" name="product_name" required="">
					</div>
				  </div>
				  <div class="control-group">
					  <label class="control-label" for="fileInput">Product Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
					  </div>
					</div>
				  <div class="control-group">
					<label class="control-label" for="selectError2">Category</label>
					<div class="controls">
					  <select id="selectError2" data-rel="chosen" name="category_id">
					  	  <option value="0">-----SELECT------</option>
					  	<?php
					  		$category_info=DB::table('tbl_category')
								  			->where(['publication_status'=>1])
								  			->get();
					  		foreach ($category_info as $v_category) { 
					  	?>		

					  			<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
					  	<?php
					  		}
					  	?> 
						
						
					  </select>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError">Manufacture</label>
					<div class="controls">
					  <select id="selectError" data-rel="chosen" name="manufacture_id">
						<option value="0">-----SELECT------</option>
						<?php
							$manufacture_info=DB::table('tbl_manufacture')
												->where(['publication_status'=>1])
												->get();
							foreach ($manufacture_info as $v_manufacture) { ?>
								<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
						<?php
							}
						?>
						
						
					  </select>
					</div>
				  </div>
				  <div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Short Description</label>
					  <div class="controls">
						<textarea id="textarea2" rows="3" name="product_short_description" required>{{$productInfo->product_short_description}}</textarea>
					  </div>
				  </div>
				  <div class="control-group hidden-phone">
					  <label class="control-label" for="textarea3">Description Details</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea3" rows="3" name="product_long_description" required>{{$productInfo->product_long_description}}</textarea>
					  </div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput2">Product Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="focusedInput2" type="text" value="{{$productInfo->product_price}}" name="product_price" required="">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput3">Product Size</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="focusedInput3" type="text" value="{{$productInfo->product_size}}" name="product_size" required="">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput4">Product Color</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="focusedInput4" type="text" value="{{$productInfo->product_color}}" name="product_color" required="">
					</div>
				  </div>
				  
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary">Update Product</button>
					<button type="reset" class="btn">Cancel</button>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->
@endsection