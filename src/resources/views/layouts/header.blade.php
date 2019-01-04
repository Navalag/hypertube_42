<!-- START HEADER -->
<div class="header ">
	<!-- START MOBILE SIDEBAR TOGGLE -->
	<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu menu_button" data-toggle="sidebar"></a>
	<!-- END MOBILE SIDEBAR TOGGLE -->
	<div class="logo_container">
		<div class="brand inline">
			<a href="/"><h2 class="logo"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h2></a>
			<!-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> -->
		</div>
	</div>
	<div class="live_load_container">
		<input id="live_search_input" type="text" name="live_search" placeholder="{{ __('Type here to search...') }}" value="" class="live_search form-control" autocomplete="on">
		<button class="btn btn-primary reset-button" id="reset_button">{{ __('search') }}</button>
	</div>
	<div class="d-flex align-items-center">
		<!-- START User Info-->
		<div class="dropdown dropdown-default m-r-20">

    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{Session::get('locale')=='ua' ? 'Українська' : 'English'}}
    </button>

    <div class="dropdown-menu">
      <a class="dropdown-item" href="/user/set_lang?lang=en">English</a>
      <a class="dropdown-item" href="/user/set_lang?lang=ua">Українська</a>
    </div>
        </div>

		<div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
			<span class="semi-bold" id="firstName">{{ $user_info->first_name }}</span> <span class="text-master" id="lastName">{{ $user_info->last_name }}</span>
		</div>
		<div class="dropdown pull-right hidden-md-down">
			<button class="profile-dropdown-toggle p-r-15">
				<span class="thumbnail-wrapper d32 circular inline">
				<img id="avatar" src="{{ url($user_info->photo_src) }}" alt="" data-src="{{ url($user_info->photo_src) }}" data-src-retina="{{ url($user_info->photo_src) }}" width="32" height="32">
				</span>
			</button>
		</div>
		<ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-10 p-r-10">
			<li class="p-r-10 inline">
				<a href="#" class="header-icon pg pg-settings" data-target="#modalSlideLeft" data-toggle="modal"></a>
			</li>
			<li class="inline">
				<a class="header-icon pg pg-power" href="{{ route('logout') }}" onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();" class="clearfix">
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- END HEADER -->

<!-- Modal -->
<!-- MODAL STICK UP ALERT -->
<div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
				</button>
				<div class="container-xs-height full-height">
					<div class="row-xs-height">
						<div class="modal-body col-xs-height col-middle">
							<!-- START card -->
							<div id="alertNotification"></div>
							<div class="card card-transparent">
								<div class="card-block">
									<form id="form-project" role="form" autocomplete="off" method="post" action="{{ route('user.edit_prof') }}">
										@csrf

										<p>{{ __('Avatar') }}</p>
										<div class="form-group form-group-default">
											<label class="">{{ __('Chouse profile photo') }}</label>
											<input type="file" name="image" id="uploadAvatar" class="form-control" style="padding-top: 3px;">
										</div>
										<br>
										<p class="m-t-10">{{ __('Basic Information') }}</p>
										<div class="form-group-attached">
											<div class="form-group form-group-default">
												<label>{{ __('Username') }}</label>
												<input type="text" class="form-control" name="username" value="{{ $user_info->username }}" required>
											</div>
											<div class="row clearfix">
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>{{ __('First name') }}</label>
														<input type="text" class="form-control" name="firstName" value="{{ $user_info->first_name }}" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>{{ __('Last name') }}</label>
														<input type="text" class="form-control" name="lastName" value="{{ $user_info->last_name }}" required>
													</div>
												</div>
											</div>
										</div>
										<br>
										<p class="m-t-10">{{ __('Account Information') }}</p>
										<div class="m-t-10">
											<div class="form-group form-group-default">
												<label class="">{{ __('Email') }}</label>
												<input type="email" class="form-control" value="{{ $user_info->email }}" name="email">
											</div>
										</div>
										<div class="form-group-attached">
											<div class="form-group form-group-default">
												<label>{{ __('Old Password') }}</label>
												<input type="password" class="form-control" name="oldPass" placeholder="To change password type an old one here">
											</div>
											<div class="row clearfix">
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>{{ __('New Password') }}</label>
														<input type="password" class="form-control" name="newPassword" placeholder="Minimum of 6 Charactors">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>{{ __('Repeat New Password') }}</label>
														<input type="password" class="form-control" name="newPassword_confirmation" placeholder="Confirm new password">
													</div>
												</div>
											</div>
										</div>
										<br>
										<br>
										<button class="btn btn-success" id="updateProfile" type="submit">{{ __('Update Profile') }}</button>
									</form>
								</div>
							</div>
							<!-- END card -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP SMALL ALERT -->

@push('scripts')
	<script src="{{ asset('js/app.js') }}"></script>
@endpush
