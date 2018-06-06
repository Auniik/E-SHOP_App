@extends('admin_layout')
@section('title', 'Add Manufacture')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/all-manufacture')}}">All Manufacture</a></li>
</ul>
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>All Manufacture</h2>
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
				  <th>Manufacture ID</th>
				  <th>Manufacture Name</th>
				  <th>Manufacture Description</th>
				  <th>Publication Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		  <tbody>
		  	<?php
		  		$sl=0;
		  	?>
		  	@foreach($all_manufacture_info as $v_manufacture)
			<tr>
				<td>{{$sl=$sl+1}}</td>
				<td class="center">{{$v_manufacture->manufacture_name}}</td>
				<td class="center">{{$v_manufacture->manufacture_description}}</td>
				@if($v_manufacture->publication_status==1)
				<td class="center">
					<span class="label label-success">Active</span>
				</td>
				@else
				<td class="center">
					<span class="label label-danger">Inactive</span>
				</td>
				@endif


				<td class="center">
					@if($v_manufacture->publication_status==1)
					<a class="btn btn-default" href="{{URL::to('/inactive-manufacture/'.$v_manufacture->manufacture_id)}}">
						<i class="halflings-icon white thumbs-down"></i>  
					</a>
					@else
					<a class="btn btn-success" href="{{URL::to('/active-manufacture/'.$v_manufacture->manufacture_id)}}">
						<i class="halflings-icon white thumbs-up"></i>  
					</a>
					@endif
					<a class="btn btn-info" href="{{URL::to('/edit-manufacture/'.$v_manufacture->manufacture_id)}}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a class="btn btn-danger" id="delete" href="{{URL::to('/delete-manufacture/'.$v_manufacture->manufacture_id)}}">
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