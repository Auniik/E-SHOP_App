@extends('admin_layout')
@section('title', 'Edit Manufacture')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/edit-manufacture')}}">Edit Manufacture</a></li>
</ul>

<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Manufacture</h2>
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
	<form class="form-horizontal" action="{{URL::to('/update-manufacture/'.$manufacture_info->manufacture_id)}}" method="post">
		{{csrf_field()}}
	  <fieldset>
		<div class="control-group">
		  <label class="control-label" for="typeahead">Manufacture Name </label>
		  <div class="controls">
			<input type="text" value="{{$manufacture_info->manufacture_name}}" class="span6 typeahead" id="typeahead" name="manufacture_name" required="">
		  </div>
		</div>        
		<div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2">Manufacture Description</label>
		  <div class="controls">
			<textarea class="cleditor" id="textarea2" name="manufacture_description" rows="3" required>{{$manufacture_info->manufacture_description}}</textarea>
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