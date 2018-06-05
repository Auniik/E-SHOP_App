@extends('admin_layout')
@section('title', 'All Category')

@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/all-category')}}">All Category</a></li>
</ul>
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
	</div>
	<div class="box-content">
		<?php
			$inactive_message= Session::get('inactive_message');
			$active_message= Session::get('active_message');
			if ($inactive_message) {
				echo "<div class='alert alert-error'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<strong>$inactive_message </strong> </div>";
					Session::put('inactive_message',null);
			}
			elseif ($active_message) {
				echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<strong>$active_message </strong> </div>";
					Session::put('active_message',null);
			}
		?>
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Category ID</th>
				  <th>Category Name</th>
				  <th>Category Description</th>
				  <th>Publication Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		  <tbody>
		  	@foreach($all_category_info as $v_category)
			<tr>
				<td>{{$v_category->category_id}}</td>
				<td class="center">{{$v_category->category_name}}</td>
				<td class="center">{{$v_category->category_description}}</td>
				@if($v_category->publication_status==1)
				<td class="center">
					<span class="label label-success">Active</span>
				</td>
				@else
				<td class="center">
					<span class="label label-danger">Inactive</span>
				</td>
				@endif


				<td class="center">
					@if($v_category->publication_status==1)
					<a class="btn btn-default" href="{{URL::to('/inactive-category/'.$v_category->category_id)}}">
						<i class="halflings-icon white thumbs-down"></i>  
					</a>
					@else
					<a class="btn btn-success" href="{{URL::to('/active-category/'.$v_category->category_id)}}">
						<i class="halflings-icon white thumbs-up"></i>  
					</a>
					@endif
					<a class="btn btn-info" href="{{URL::to('/edit-category/'.$v_category->category_id)}}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a class="btn btn-danger" href="{{URL::to('/delete-category/'.$v_category->category_id)}}">
						<i class="halflings-icon white trash"></i> 
					</a>
				</td>
			</tr>
			@endforeach				
		  </tbody>
	  </table>            
	</div>
</div>
@endsection