@extends('admin_layout')
@section('title', 'All Slider')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/all-slider')}}">All Slider</a></li>
</ul>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
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
					  <th>ID</th>
					  <th>Slider Image</th>
					  <th>Publication Status</th>

					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@php
			  		$sl=0;
			  	@endphp
			  	@foreach($all_slider_info as $v_slider)
				<tr>
					<td>{{$sl=$sl+1}}</td>
					<td class="center"><img src="{{URL::to($v_slider->slider_image)}}" style="height:70px; width: 200px"></td>		
					@if($v_slider->publication_status==1)
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
					@else
					<td class="center">
						<span class="label label-danger">Inactive</span>
					</td>
					@endif

					<td class="center">
						@if ($v_slider->publication_status==1)
							<a class="btn btn-default" href="{{URL::to('/inactive-slider/'.$v_slider->slider_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
						@endif
						<a class="btn btn-danger" id="delete" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}">
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