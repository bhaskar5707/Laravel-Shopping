@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form"><!--form-->
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
				<h2>Login to your account</h2>
				<form action="{{ url('/user-login') }}" method="post">
					{{ csrf_field() }}
					<input type="text" name="email" placeholder="Email" />
					<input type="password" name="password" placeholder="Password" />
					<span>
						<input type="checkbox" class="checkbox"> 
						Keep me signed in
					</span>
					<button type="submit" class="btn btn-default">Login</button>
				</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>New User Signup!</h2>
				<form id="registerForm" method="post" name="registerForm" action="{{ url('/user-register') }}">
					{{ csrf_field() }}
					<input id="name" name="name" type="text" placeholder="Name"/>
					<input id="email" name="email" type="email" placeholder="Email Address"/>
					<input id="password" name="password" type="password" placeholder="Password"/>
					<button type="submit" class="btn btn-default">Signup</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>
</div>
</section><!--/form-->


@endsection