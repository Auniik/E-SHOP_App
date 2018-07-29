@extends('admin_layout')
@section('title', 'Add Slider')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/add-slider')}}">Add Slider</a></li>
</ul>

{{-- <div class="row-fluid sortable"> --}}
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
		</div>
	<div class="box-content">
		<div>
			<?php
				$message=Session::get('message');
				if ($message) {
					echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<strong>$message </strong> </div>";
					Session::put('message',null);
				}
			?>
		</div>
		<form class="form-horizontal" action="{{URL::to('/save-slider')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
		  <fieldset>
			<div class="control-group">
				  <label class="control-label" for="fileInput">Slider Image</label>
				  <div class="controls">
					<input class="input-file uniform_on" id="fileInput" type="file" name="slider_image">
				  </div>
				</div>
			<div class="control-group">
				<label class="control-label" for="pubs">Publication Status</label>
				<div class="controls">
				  <label class="checkbox inline">
					 <input type="checkbox" id="pubs" name="publication_status" value="1">.
				  </label>
			    </div>
			</div>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Add Slider</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
		</form>   
		</div>
	</div>
{{-- </div> --}}
@endsection