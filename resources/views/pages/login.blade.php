@extends('layout')

@section('content')
<div class="container col-md-offset-1">
	<div class="row">
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>New User Signup!</h2>
				<form action="{{URL::to('/customer-registration')}}" method="post">
					@csrf
					<input type="text" placeholder="Full Name" name="customer_name" required=""/>
					<input type="email" placeholder="Email Address" name="customer_email" required="" />
					<input type="text" placeholder="Mobile Number" name="customer_mobile" required="">
					<input type="password" placeholder="Password" name="customer_password" required="" />
					<button type="submit" class="btn btn-default">Signup</button>
				</form>
			</div><!--/sign up form-->
		</div>
		
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>

		<div class="col-sm-4">
			@php
			$login_error=Session::get('login_error');
			if($login_error){
				echo "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<strong>$login_error </strong> </div>";
				Session::put('login_error',null);
			}
			@endphp
			<div class="login-form"><!--login form-->
				<h2>Login to your account</h2>
				<form action="{{URL::to('/customer-login')}}" method="post">
					@csrf
					<input type="email" placeholder="Email Address" name="customer_email" required="" />
					<input type="password" placeholder="Password" name="customer_password" required="" />
					<span>
						<input type="checkbox" class="checkbox"> 
						Keep me signed in
					</span>
					<button type="submit" class="btn btn-default">Login</button>
				</form>
			</div><!--/login form-->
		</div>
	</div>
</div><br><br>
@endsection
