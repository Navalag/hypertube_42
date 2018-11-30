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
			<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
			<p class="p-t-35">Sign in to see all the movies on this planet</p>
			<!-- START Login Form -->
			<form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
				@csrf

				<!-- START Form Control-->
				<div class="form-group form-group-default">
					<label>Login</label>
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
					<label>Password</label>
					<div class="controls">
						<input type="password" class="form-control" name="password" placeholder="Credentials" required>
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
							<label for="checkbox1">Keep Me Signed in</label>
						</div>
					</div>
					<div class="col-md-6 d-flex align-items-center justify-content-end">
						<a href="/password/reset" class="text-info small">Forgot password?</a>
					</div>
				</div>
				<!-- END Form Control-->
				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-primary btn-cons m-t-10 m-b-30" type="submit">Sign in</button>
					</div>
					<!-- <div class="col-md-6"> -->
						<span class="m-t-15 m-l-15"> or <a href="/register">Register</a></span>
					<!-- </div> -->
				</div>
				<!-- <button class="btn btn-primary btn-cons m-t-10 m-b-30" type="submit">Sign in</button> -->
			</form>

			<button class="btn btn-block btn-info" type="button">
				<span class="pull-left"><i class="fa fa-facebook"></i></span>
				<span class="bold">Login with Facebook</span>
			</button>
			<button class="btn btn-block btn-primary" type="button">
				<span class="pull-left"><i class="fa fa-twitter"></i></span>
				<span class="bold">Login with Twitter</span>
			</button>
			<button class="btn btn-block btn-danger" type="button">
				<span class="pull-left"><i class="fa fa-google-plus"></i></span>
				<span class="bold">Login with Google+</span>
			</button>
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
