@extends('layouts.app')

@section('content')
<div class="register-container full-height sm-p-t-30">
	<div class="d-flex justify-content-center flex-column full-height ">
		<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
		<h3>A web application that allows users to research and watch videos</h3>
		<p>
			Create a HyperTube account. If you have a facebook account, log into it for this process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
		</p>
		<form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('register') }}">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>First Name</label>
						<input type="text" name="first_name" placeholder="John" class="form-control" value="{{ old('first_name') }}" required>
					</div>
					@if ($errors->has('first_name'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('first_name') }}</label>
					@endif
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>Last Names</label>
						<input type="text" name="last_name" placeholder="Smith" class="form-control" value="{{ old('last_name') }}" required>
					</div>
					@if ($errors->has('last_name'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('last_name') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>HyperTube User name</label>
						<input type="text" name="username" placeholder="your.username (this can be changed later)" class="form-control" value="{{ old('username') }}" required>
					</div>
					@if ($errors->has('username'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('username') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>Email</label>
						<input type="email" name="email" placeholder="We will send loging details to you" class="form-control" value="{{ old('email') }}" required>
					</div>
					@if ($errors->has('email'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('email') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>Password</label>
						<input type="password" name="password" placeholder="Minimum of 6 Charactors" class="form-control" required>
					</div>
					@if ($errors->has('password'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('password') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>Confirm Password</label>
						<input type="password" name="password_confirmation" placeholder="Confirm password above" class="form-control" required>
					</div>
					@if ($errors->has('password'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('password') }}</label>
					@endif
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-lg-6">
					<p><small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small></p>
				</div> -->
				<div class="offset-lg-6 col-lg-6 text-right">
					<p><small>Already have an acount?</small> <a href="/login" class="text-info small">Sign In</a></p>
				</div>
			</div>
			<button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
		</form>
	</div>
</div>

@endsection

@push('scripts')
	<script>
	$(function()
	{
		$('#form-register').validate()
	})
	</script>
@endpush
