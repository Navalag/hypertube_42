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
		<img src="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src-retina="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" alt="" class="lazy">
		<!-- END Background Pic-->
		<!-- START Background Caption-->
		<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
			<h2 class="semi-bold text-white">{{ __('A web application that allows users to research and watch videos') }}</h2>
			<p class="small">
				Developed with &#9825; by: <a style="color: white;" target="_blank" href="https://github.com/Navalag">Navalag</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/vsyveniu">vsyveniu</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/IgorALLin">ichebota</a><span class="muted"> | </span><a style="color: white;" target="_blank" href="https://github.com/lito747">mpytienk</a></br> © 2018 UNIT Factory (42 school) project.
			</p>
		</div>
		<!-- END Background Caption-->
	</div>
	<!-- END Login Background Pic Wrapper-->
	<!-- START Login Right Container-->
	<div class="login-container bg-white">
		<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
			<h2 class="logo"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h1>
			<p class="p-t-35">{{ __('Sign in to see all the movies on this planet') }}</p>
			<!-- START Login Form -->
			<form class="p-t-15" role="form" method="POST" action="{{ route('setLanguage') }}">
				@csrf
				<div class="radio radio-primary">
					<input type="radio" {{Session::get('locale')=='en'||!Session::get('locale')?'checked=checked':''}} value="en" name="lang" id="en">
					<label for="en">English</label>
					<input type="radio" {{Session::get('locale')=='ua'?'checked=checked':''}} value="ua" name="lang" id="ua">
					<label for="ua">Українська</label>
					<button class="btn btn-tag  btn-tag-dark btn-tag-rounded m-r-20" type="submit">{{ __('Select') }}</button>
				</div>
			</form>
			<form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
				@csrf
				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>{{ __('Email') }}</label>
					<div class="controls">
						<input type="email" name="email" placeholder="{{ __('Enter your email') }}" class="form-control" value="{{ old('email') }}" required>
					</div>
				</div>
				@if ($errors->has('email'))
					<label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
				@endif
				<!-- END Form Control-->
				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>{{ __('Password') }}</label>
					<div class="controls">
						<input type="password" class="form-control" name="password" placeholder="{{ __('Credentials') }}" required>
					</div>
				</div>
				@if ($errors->has('password'))
					<label id="email-error" class="error" for="email">{{ $errors->first('password') }}</label>
				@endif
				<!-- START Form Control-->
				<div class="row">
					<div class="col-md-6 no-padding sm-p-l-10">
						<div class="checkbox ">
							<input type="checkbox" value="1" id="checkbox1" name="remember" {{ old('remember') ? 'checked' : '' }}>
							<label for="checkbox1">{{ __('Keep Me Signed in') }}</label>
						</div>
					</div>
					<div class="col-md-6 d-flex align-items-center justify-content-end">
						<a href="/password/reset" class="text-info small">{{ __('Forgot password?') }}</a>
					</div>
				</div>
				<!-- END Form Control-->
				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-primary btn-cons m-t-10 m-b-30" type="submit">{{ __('Sign in') }}</button>
					</div>
					<span class="m-t-15 m-l-15"> {{ __('or') }} <a href="/register">{{ __('Register') }}</a></span>
				</div>
			</form>

			<button class="btn btn-block btn-info" type="button" onclick="location.href='login/github'">
				<span class="pull-left"><i class="fab fa-github-alt"></i></span>
				<span class="bold">{{ __('Login with') }} GitHub</span>
			</button>
			<button class="btn btn-block btn-success" type="button" onclick="location.href='login/42'">
				<span class="pull-left"><img src="{{ asset('assets/img/42-logo.svg') }}" style="width: 17px;"></span>
				<span class="bold">{{ __('Login with') }} 42 Intranet</span>
			</button>
			<button class="btn btn-block btn-danger" type="button" onclick="location.href='login/google'">
				<span class="pull-left"><i class="fab fa-google-plus-g"></i></span>
				<span class="bold">{{ __('Login with') }} Google+</span>
			</button>
		</div>
	</div>
	<!-- END Login Right Container-->
</div>

@endsection

@push('scripts')
	<script>
	$(function()
	{
		$('#form-login').validate()
	})
	</script>
@endpush
