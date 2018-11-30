@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Reset Password') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('password.update') }}">
						@csrf

						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Reset Password') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
















@extends('layouts.app')

@section('content')
<script type="text/javascript">
window.onload = function()
{
	// fix for windows 8
	if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
		document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
}
</script>

<div class="login-wrapper ">
	<!-- START Login Background Pic Wrapper-->
	<div class="bg-pic">
		<!-- START Background Pic-->
		<img src="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src-retina="{{ asset('assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" alt="" class="lazy">
		<!-- END Background Pic-->
		<!-- START Background Caption-->
		<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
			<h2 class="semi-bold text-white">
			A web application that allows users to research and watch videos</h2>
			<p class="small">
				Developed with &#9825; by: <a style="color: white;" target="_blank" href="https://github.com/Navalag">Navalag</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/vsyveniu">vsyveniu</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/IgorALLin">ichebota</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/lito747">mpytienk</a></br> © 2018 UNIT FACTORY (42 school) project.
			</p>
		</div>
		<!-- END Background Caption-->
	</div>
	<!-- END Login Background Pic Wrapper-->
	<!-- START Login Right Container-->
	<div class="login-container bg-white">
		<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
			<img src="{{ asset('assets/img/logo.png') }}" alt="logo" data-src="{{ asset('assets/img/logo.png') }}" data-src-retina="{{ asset('assets/img/logo_2x.png') }}" width="78" height="22">
			<p class="p-t-35">Reset password</p>
			<!-- START Login Form -->
			<form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('password.update') }}">
				@csrf

				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>Email</label>
					<div class="controls">
						<input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
					</div>
				</div>
				@if ($errors->has('email'))
					<label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
				@endif
				<!-- END Form Control-->
				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>New password</label>
					<div class="controls">
						<input type="password" name="password" placeholder="Minimum of 6 Charactors" class="form-control" required>
					</div>
				</div>
				@if ($errors->has('password'))
					<label id="email-error" class="error" for="email">{{ $errors->first('password') }}</label>
				@endif
				<!-- END Form Control-->
				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>Confirm new password</label>
					<div class="controls">
						<input type="password" name="password_confirmation" placeholder="Confirm password above" class="form-control" required>
					</div>
				</div>
				<!-- END Form Control-->
				
				<!-- START Form Control-->
				<div class="row">
					<div class="col-md-6 no-padding sm-p-l-10">
						
					</div>
					<div class="col-md-6 d-flex align-items-center justify-content-end">
						<a href="/login" class="text-info small">Back to Signin</a>
					</div>
				</div>
				<!-- END Form Control-->
				<button class="btn btn-primary btn-cons m-t-10 m-b-30" type="submit">Reset Password</button>
			</form>

		</div>
	</div>
	<!-- END Login Right Container-->
</div>

<script>
$(function()
{
	$('#form-login').validate()
})
</script>
@endsection
