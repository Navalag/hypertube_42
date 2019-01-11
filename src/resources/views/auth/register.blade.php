@extends('layouts.app')

@section('content')
<div class="register-container full-height sm-p-t-30">
	<div class="d-flex justify-content-center flex-column full-height ">
		<h2 class="logo"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h1>
		<h3>{{ __('A web application that allows users to research and watch videos') }}</h3>
		<p>
			{{ __('Create a HyperTube account. If you have a facebook account, log into it for this process. Sign in with ') }}<a href="login/github" class="text-info">GitHub</a>, <a href="login/42" class="text-info">42 Intranet</a> {{ __('or') }} <a href="login/google" class="text-info">Google.</a>
		</p>
		<form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('register') }}">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>{{ __('First name') }}</label>
						<input type="text" name="first_name" placeholder="{{ __('John') }}" class="form-control" value="{{ old('first_name') }}" required>
					</div>
					@if ($errors->has('first_name'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('first_name') }}</label>
					@endif
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-default">
						<label>{{ __('Last name') }}</label>
						<input type="text" name="last_name" placeholder="{{ __('Smith') }}" class="form-control" value="{{ old('last_name') }}" required>
					</div>
					@if ($errors->has('last_name'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('last_name') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>{{ __('HyperTube User name') }}</label>
						<input type="text" name="username" placeholder="{{ __('your.username (this can be changed later)') }}" class="form-control" value="{{ old('username') }}" required>
					</div>
					@if ($errors->has('username'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('username') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>{{ __('Email') }}</label>
						<input type="email" name="email" placeholder="{{ __('We will send loging details to you') }}" class="form-control" value="{{ old('email') }}" required>
					</div>
					@if ($errors->has('email'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('email') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>{{ __('Password') }}</label>
						<input type="password" name="password" placeholder="{{ __('Minimum of 6 Charactors') }}" class="form-control" required>
					</div>
					@if ($errors->has('password'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('password') }}</label>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-default">
						<label>{{ __('Confirm Password') }}</label>
						<input type="password" name="password_confirmation" placeholder="{{ __('Confirm password above') }}" class="form-control" required>
					</div>
					@if ($errors->has('password'))
						<label id="fname-error" class="error" for="fname">{{ $errors->first('password') }}</label>
					@endif
				</div>
			</div>
			<div class="row m-t-10">
				<div class="offset-lg-6 col-lg-6 text-right">
					<p><small>{{ __('Already have an acount?') }}</small> <a href="/login" class="text-info small">{{ __('Sign In') }}</a></p>
				</div>
			</div>
			<button class="btn btn-primary btn-cons m-t-10" type="submit">{{ __('Create a new account') }}</button>
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
