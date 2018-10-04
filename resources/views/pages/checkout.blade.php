@extends('layout')

@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			<div class="register-req">
				<p>Please fill all the fields And Checkout to easily get access to your order history.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">										
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-two" style="margin-left: 0;">
								<form action="{{URL::to('/checkout')}}" method="get">
									<input type="text" name="shipping_first_name" placeholder="First Name*" required="">
									<input type="text" name="shipping_last_name" placeholder="Last Name" required="">
									<input type="email" name="shipping_email" placeholder="Email*" required="">
									<input type="text" name="shipping_mobile_number" placeholder="Mobile Number*" required="">
									<input type="text" name="shipping_address" placeholder="Address 1 *" required="">
									<select  name="shipping_city">
										<option>-- City --</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chottogram">Chottogram</option>
										<option value="Barishal">Barishal</option>
										<option value="Khulna">Khulna</option>
										<option value="Rajshahi">Rajshahi</option>
										<option value="Mymensingh">Mymensingh</option>
										<option value="Rangpur">Rangpur</option>
									</select>
									<input type="text" name="shipping_zip" placeholder="Zip / Postal Code *" required="">
									<input type="submit" class="btn btn-warning" style="color:#333" name="checkout" value="Next">
									<br><br>
								</form>
							</div>
						</div>	
					</div>
					
				</div>
			</div>
			

		
	</section> <!--/#cart_items-->

@endsection