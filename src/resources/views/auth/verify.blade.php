@extends('layouts.app')

@section('content')

@if (session('resent'))
	<div class="alert alert-info d-flex" role="alert">
	  <p class="mr-auto overflow-ellipsis no-padding">{{ __('A fresh verification link has been sent to your email address.') }}</p>
	  <button class="close" data-dismiss="alert"></button>
	  <div class="clearfix"></div>
	</div>
@endif

<div class="container container-fixed-lg m-t-40">
	<div class="card card-transparent">
		<div class="row">
      <div class="col-lg-6 offset-lg-3">
				<div class="card card-default">
					<div class="card-header  separator">
						<div class="card-title">{{ __('Verify Your Email Address') }}
						</div>
					</div>
					<div class="card-block">
						<h3>{{ __('Before proceeding, please check your email for a verification link.') }}</h3>

						{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
