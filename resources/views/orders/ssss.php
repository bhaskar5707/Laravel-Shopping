@extends('layouts.frontLayout.front_design')
@section('content')
<?php use App\Order; ?>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Thanks</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<h3>Your Order Has Been Placed</h3>
			<p>Your order number is {{ Session::get('order_id') }} ans total payable amount is INR {{ Session::get('grand_total') }}</p>
			<p>Please make payment by clicking on below Payment Button</p>
            <?php
                $orderDetails = Order::getOrderDetails(Session::get('order_id'));
                $orderDetails = json_decode(json_encode($orderDetails));
                //echo "<pre>";print_r($orderDetails);die;
                $nameArr = explode(' ',$orderDetails->name);
                $getCountryCode = Order::getCountryCode($orderDetails->country);
            ?>
		    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
		        <input type="hidden" name="business" value="sunilhrit143@gmail.com">
		        <input type="hidden" name="cmd" value="_xclick">
		        <input type="hidden" name="item_name" value="{{ Session::get('order_id') }}">
		        <input type="hidden" name="currency_code" value="INR">
		        <input type="hidden" name="amount" value="{{ Session::get('grand_total') }}">
		        <input type="hidden" name="first_name" value="{{ $nameArr[0] }}">
		        <input type="hidden" name="last_name" value="{{ $nameArr[1] }}">
		        <input type="hidden" name="address1" value="{{ $orderDetails->address }}">
		        <input type="hidden" name="address2" value="">
		        <input type="hidden" name="city" value="{{ $orderDetails->city }}">
		        <input type="hidden" name="state" value="{{ $orderDetails->state }}">
		        <input type="hidden" name="zip" value="{{ $orderDetails->pincode }}">
		        <input type="hidden" name="email" value="{{ $orderDetails->user_email }}">
		        <input type="hidden" name="country" value="{{ $getCountryCode->country_code }}">
		        
		        
		        <!-- Specify URLs -->
		        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
		        <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
		        
		        <!-- Display the payment button. -->
		        <input type="image" name="submit" border="0"
		        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
		        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
		    </form>

		</div>
	</div>
</section>>


@endsection

<?php 
    Session::forget('grand_total');
    Session::forget('order_id');
?>