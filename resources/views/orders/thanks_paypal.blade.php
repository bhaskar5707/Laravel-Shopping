@extends('layouts.frontLayout.front_design')
@section('content')

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
			<h3>Your Paypal Order Has Been Placed</h3>
			<h3>Thanks For The Payment .We will process your order very soon</h3>
			<p>Your order number is {{ Session::get('order_id') }} ans total payable amount is INR {{ Session::get('grand_total') }}</p>
		</div>
	</div>
</section>>


@endsection

<?php 
    Session::forget('grand_total');
    Session::forget('order_id');
?>