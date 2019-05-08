@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top: 20px;"><!--form-->
<div class="container">
	@if(Session::has('flash_message_error'))  
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{!! session('flash_message_error') !!}</strong> 
      </div>    
    @endif 
    @if(Session::has('flash_message_success'))  
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{!! session('flash_message_success') !!}</strong> 
      </div>    
    @endif
	<form action="{{ url('/checkout') }}" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Bill To</h2>
					<div class="form-group">
						<input type="text" name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif placeholder="Billing Name" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif  placeholder="Billing Address" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif  placeholder="Billing City" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{ $userDetails->state }}" @endif  placeholder="Billing State" class="form-control" />
					</div>
					<div class="form-group">
						<select id="billing_country" name="billing_country">
							<option value="">Select Country</option>
							@foreach($countries as $country)
							   <option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
							@endforeach
					   </select>
                    </div>
                    <div class="form-group">
						<input type="text" name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->pincode)) value="{{ $userDetails->pincode }}" @endif  placeholder="Billing Pincode" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile)) value="{{ $userDetails->mobile }}" @endif  placeholder="Billing Mobile" class="form-control"  />
					</div>
					<div class="form-check">
						<input @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="Checkbox" class="form-check-input" id="billtoship">
						<label class="form-check-label" for="billtoship">Shippping address same as billing address</label>
					</div>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or"></h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Ship To</h2>
					<div class="form-group">
						<input type="text" id="shipping_name" name="shipping_name" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif placeholder="Shipping Name" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" id="shipping_address" name="shipping_address" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif placeholder="Shipping Address" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" id="shipping_city" name="shipping_city" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif placeholder="Shipping City" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" id="shipping_state" name="shipping_state" @if(!empty($shippingDetails->state)) value="{{ $shippingDetails->state }}" @endif placeholder="Shipping State" class="form-control" />
					</div>
					<div class="form-group">
						<select id="shipping_country" name="shipping_country">
							<option value="">Select Country</option>
							@foreach($countries as $country)
							   <option value="{{ $country->country_name }}" @if(!empty($shippingDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
							@endforeach
					   </select>
					</div>
					<div class="form-group">
						<input type="text"  id="shipping_pincode" name="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{ $shippingDetails->pincode }}" @endif placeholder="Shipping Pincode" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text"  id="shipping_mobile" name="shipping_mobile" @if(!empty($shippingDetails->mobile)) value="{{ $shippingDetails->mobile }}" @endif placeholder="Shipping Mobile" class="form-control" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Checkout</button>
					</div>
				</div><!--/sign up form-->
			</div>
		</div>
	</form>
</div>
</section><!--/form-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$('#billtoship').click(function(){
		if(this.checked)
		{
			$('#shipping_name').val($('#billing_name').val());
			$('#shipping_address').val($('#billing_address').val());
			$('#shipping_city').val($('#billing_city').val());
			$('#shipping_state').val($('#billing_state').val());
			$('#shipping_country').val($('#billing_country').val());
			$('#shipping_pincode').val($('#billing_pincode').val());
			$('#shipping_mobile').val($('#billing_mobile').val());
		}
		else
		{
			$('#shipping_name').val('');
			$('#shipping_address').val('');
			$('#shipping_city').val('');
			$('#shipping_state').val('');
			$('#shipping_country').val('');
			$('#shipping_pincode').val('');
			$('#shipping_mobile').val('');
		}
	});
</script>

@endsection