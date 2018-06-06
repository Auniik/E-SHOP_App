@extends('admin_layout')
@section('title', 'Edit Category')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Edit Category</a></li>
</ul>

{{-- <div class="row-fluid sortable"> --}}
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
		</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{URL::to('/update-category/'.$category_info->category_id)}}" method="post">
			{{csrf_field()}}
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="typeahead">Category Name </label>
			  <div class="controls">
				<input type="text" value="{{$category_info->category_name}}" class="span6 typeahead" id="typeahead" name="category_name" required="">
			  </div>
			</div>        
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Category Description</label>
			  <div class="controls">
				<textarea class="cleditor" id="textarea2" name="category_description" rows="3" required>{{$category_info->category_description}}</textarea>
			  </div>
			</div>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Update changes</button>
			</div>
		  </fieldset>
		</form>   
		</div>
	</div>
@endsection