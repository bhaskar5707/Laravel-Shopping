@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top: 20px;"><!--form-->
<div class="container">
	<div class="row">

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


		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				<h2>Update account</h2>
				<form action="{{ url('/account') }}" method="post">
					{{ csrf_field() }}
					<input type="text" name="name" value="{{ $userDetails->name }}" placeholder="Name" />
					<input type="text" name="address" value="{{ $userDetails->address }}" placeholder="Address" />
					<input type="text" name="city" value="{{ $userDetails->city }}" placeholder="City" />
					<input type="text" name="state" value="{{ $userDetails->state }}" placeholder="State" />
					<select name="country">
						<option value="">Select Country</option>
						@foreach($countries as $country)
						   <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
						@endforeach
					</select>
					<input type="text" style="margin-top: 10px;" name="pincode" value="{{ $userDetails->pincode }}" placeholder="Pincode" />
					<input type="text" name="mobile" value="{{ $userDetails->mobile }}" placeholder="Mobile" />
					<button type="submit" class="btn btn-default">Save</button>
				</form>
				
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>Update password</h2>
				<form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="post">
					{{ csrf_field() }}
					<input type="text" name="current_pwd" id="current_pwd"  placeholder="Password" />
					<span id="chkPwd"></span>
					<input type="text" name="new_pwd" id="new_pwd" placeholder="Confirm password" />
					<input type="text" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm password" />
					<button type="submit" class="btn btn-default">Change Password</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>
</div>
</section><!--/form-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$('#current_pwd').keyup(function(){
    var current_pwd = $(this).val();
    $.ajax({
    	headers:{
    		    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    	},
        type:'get',
        url:'/check-user-pwd',
        data:{current_pwd:current_pwd},
        success:function(resp){
        	//alert(resp);
        	if(resp == 'false')
        	{
                $('#chkPwd').html("<font color='red'>Current password incorrect</font>");
        	}
        	else if(resp == 'true')
        	{
                $('#chkPwd').html("<font color='green'>Current password correct</font>");
        	}
        },error:function(){
        	alert("Error");
        }
    });
});
</script>

@endsection
