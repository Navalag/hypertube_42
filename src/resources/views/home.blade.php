@extends('layouts.app')

@section('content')
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
	<!-- BEGIN SIDEBAR MENU HEADER-->
	<div class="sidebar-header">
		<h2 class="logo white"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h1>
		<!-- <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22"> -->
	</div>
	<!-- END SIDEBAR MENU HEADER-->
	<!-- START SIDEBAR MENU -->
	<div class="sidebar-menu">
		<!-- BEGIN SIDEBAR MENU ITEMS-->
		<ul class="menu-items movie-list" id="movies_list">
			<li class="m-t-30 ">
				<a href="#" class="detailed">
					<span class="title_aside">{{ __('Genres') }}</span>
				</a>
				<span class="bg-success icon-thumbnail"><i class="fas fa-film"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link" >
					<span class="title_aside" data="Action">{{ __('Action') }}</span>
					<!--<button class="add_button" data="Action">+</button>-->
				</a>
				<span class="icon-thumbnail"><i class="pg-mail"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Adventure">{{ __('Adventure') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-social"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Animation">{{ __('Animation') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-calender"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Comedy">{{ __('Comedy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Crime">{{ __('Crime') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Documentary">{{ __('Documentary') }}</span>
				</a>
				<span class="icon-thumbnail">Ui</span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Drama">{{ __('Drama') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-form"></i></span>

			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Family">{{ __('Family') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Fantasy">{{ __('Fantasy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="History">{{ __('History') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Horror">{{ __('Horror') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Music">{{ __('Music') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Mystery">{{ __('Mystery') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Romance">{{ __('Romance') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Science Fiction">{{ __('Science Fiction') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="TV Movie">{{ __('TV Movie') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Thriller">{{ __('Thriller') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="War">{{ __('War') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="movie_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Western">{{ __('Western') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link" >
					<span class="title_aside" data="Action & Adventure">{{ __('Action & Adventure') }}</span>
					<!--<button class="add_button" data="Action">+</button>-->
				</a>
				<span class="icon-thumbnail"><i class="pg-mail"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Animation">{{ __('Animation') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-social"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Comedy">{{ __('Comedy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-calender"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Crime">{{ __('Crime') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Documentary">{{ __('Documentary') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Drama">{{ __('Drama') }}</span>
				</a>
				<span class="icon-thumbnail">Ui</span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Family">{{ __('Family') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-form"></i></span>

			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Kids">{{ __('Kids') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Mystery">{{ __('Mystery') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="News">{{ __('News') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Reality">{{ __('Reality') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Sci-Fi & Fantasy">{{ __('Sci-Fi & Fantasy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Soap">{{ __('Soap') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Talk">{{ __('Talk') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="War & Politics">{{ __('War & Politics') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="tv_genre">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Western">{{ __('Western') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>

		</ul>
		<!--TV shosw-->

		<div class="clearfix"></div>
	</div>
	<!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
	<!-- START HEADER -->
	<div class="header ">
		<!-- START MOBILE SIDEBAR TOGGLE -->
		<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
		<!-- END MOBILE SIDEBAR TOGGLE -->
		<div class="">
			<div class="brand inline">
				<h2 class="logo"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h1>
				<!-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> -->
			</div>
		</div>
		<div class="live_load_container">
			<input id="live_search_input" type="text" name="live_search" placeholder="{{ __('Type here to search...') }}" value="" class="live_search" autocomplete="on">
			<button id="reset_button">{{ __('search') }}</button>
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
					<img id="avatar" src="{{ $user_info->photo_src }}" alt="" data-src="{{ $user_info->photo_src }}" data-src-retina="{{ $user_info->photo_src }}" width="32" height="32">
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
	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper ">
		<!-- START PAGE CONTENT -->
		<div class="content ">
			<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
				<!-- START CATEGORY -->
				<div class="search_field">
					<div class="switch_buttons">
						<button class="switch button is-active" onclick="switch_type(event);" id="movie_switch" data="movies">Movies</button>
						<button class="switch button" onclick="switch_type(event);" id="tvshows_switch" data="tvshows">TV Shows</button>
					</div>
					<form method="POST" class="search_form" id="movie_form">
						<div class="sort_field">
							<select name="sort" id="sort_select">
								<option>{{ __('none') }}</option>
								<option>{{ __('Title Ascending') }}</option>
								<option>{{ __('Title Descending') }}</option>
								<option>{{ __('Rating Ascending') }}</option>
								<option>{{ __('Rating Descending') }}</option>
								<option>{{ __('Popularity Ascending') }}</option>
								<option>{{ __('Popularity Descending') }}</option>
								<option>{{ __('Release Date Ascending') }}</option>
								<option>{{ __('Release Date Descending') }}</option>
								<option>{{ __('Revenue Ascending') }}</option>
								<option>{{ __('Revenue Descending') }}</option>
							</select>
						</div>
						<div class="gap_field">
							<input  name="year_gap" id="year_gap">
							<div class="slider-range_wrapper" id="slider-range_year"></div>
						</div>
						<div class="gap_field">
							<input  name="rate_gap" id="rate_gap">
							<div class = "slider-range_wrapper" id="slider-range_rate"></div>
						</div>
						<div class="genres_field">
							<select multiple class="chosen-select" name="genre" id="genre_select">
								<option>{{ __('Action') }}</option>
								<option>{{ __('Adventure') }}</option>
								<option>{{ __('Animation') }}</option>
								<option>{{ __('Comedy') }}</option>
								<option>{{ __('Crime') }}</option>
								<option>{{ __('Documentary') }}</option>
								<option>{{ __('Drama') }}</option>
								<option>{{ __('Family') }}</option>
								<option>{{ __('Fantasy') }}</option>
								<option>{{ __('History') }}</option>
								<option>{{ __('Horror') }}</option>
								<option>{{ __('Music') }}</option>
								<option>{{ __('Mystery') }}</option>
								<option>{{ __('Romance') }}</option>
								<option>{{ __('Science Fiction') }}</option>
								<option>{{ __('TV Movie') }}</option>
								<option>{{ __('Thriller') }}</option>
								<option>{{ __('War') }}</option>
								<option>{{ __('Western') }}</option>
							</select>
						</div>
						<div>
							<button id="search_submit">{{ __('search') }}</button>
						</div>
					</form>
					<form method="POST" class="search_form" id="tv_form">
						<div class="sort_field">
							<select name="sort" id="sort_select_tv">
								<option>{{ __('none') }}</option>
								<option>{{ __('Title Ascending') }}</option>
								<option>{{ __('Title Descending') }}</option>
								<option>{{ __('Rating Ascending') }}</option>
								<option>{{ __('Rating Descending') }}</option>
								<option>{{ __('Popularity Ascending') }}</option>
								<option>{{ __('Popularity Descending') }}</option>
								<option>{{ __('Release Date Ascending') }}</option>
								<option>{{ __('Release Date Descending') }}</option>
							</select>
						</div>
						<div class="gap_field">
							<input  name="year_gap" id="year_gap_tv">
							<div class="slider-range_wrapper" id="slider-range_year_tv"></div>
						</div>
						<div class="gap_field">
							<input  name="rate_gap" id="rate_gap_tv">
							<div class = "slider-range_wrapper" id="slider-range_rate_tv"></div>
						</div>
						<div class="genres_field">
							<select multiple class="chosen-select" name="genre" id="genre_select_tv">
								<option>{{ __('Action & Adventure') }}</option>
								<option>{{ __('Animation') }}</option>
								<option>{{ __('Comedy') }}</option>
								<option>{{ __('Crime') }}</option>
								<option>{{ __('Documentary') }}</option>
								<option>{{ __('Drama') }}</option>
								<option>{{ __('Family') }}</option>
								<option>{{ __('Kids') }}</option>
								<option>{{ __('Mystery') }}</option>
								<option>{{ __('News') }}</option>
								<option>{{ __('Reality') }}</option>
								<option>{{ __('Sci-Fi & Fantasy') }}</option>
								<option>{{ __('Soap') }}</option>
								<option>{{ __('Talk') }}</option>
								<option>{{ __('War & Politics') }}</option>
								<option>{{ __('Western') }}</option>
							</select>
						</div>
						<div>
							<button id="search_submit_tv">{{ __('search') }}</button>
						</div>
					</form>
					<div id="form-response"></div>
				</div>
				<div class="gallery">
					<div id="load_gif" class="load_gif_container">
						<img src="{{ asset('assets/img/load.gif') }}">
					</div>
					<section id="response">
					</section>
				</div>
				<!-- END CATEGORY -->
			</div>
			<!-- END PAGE CONTENT -->
			<!-- START COPYRIGHT -->
			<div class=" container-fluid  container-fixed-lg footer">
				<div class="copyright sm-text-center">
					<p class="small no-margin pull-left sm-pull-reset">
						<span class="hint-text">2018 &copy; </span>
						<span class="font-montserrat"></span>
						<span class="hint-text">UNIT Factory (42 school) project.</span>
					</p>
					<p class="small no-margin pull-right sm-pull-reset">
						Developed with &#9825; by: <a target="_blank" href="https://github.com/Navalag">Navalag</a><span class="muted"> | </span><a target="_blank" href="https://github.com/vsyveniu">vsyveniu</a><span class="muted"> | </span><a target="_blank" href="https://github.com/IgorALLin">ichebota</a><span class="muted"> | </span><a target="_blank" href="https://github.com/lito747">mpytienk</a>
					</p>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- END COPYRIGHT -->
		</div>
	<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

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

@endsection

@push('scripts')
	<script>
		$(document).ready(function() {
			$("#select2insidemodal").select2({
				dropdownParent: $("#modalSlideLeft"),
				minimumResultsForSearch: -1
			});
		});
	</script>

	<script src="{{ asset('assets/plugins/jquery-nouislider/jquery.nouislider.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/gallery.js') }}" type="text/javascript"></script>
	<script src="{{ asset('pages/js/search.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/app.js') }}"></script>
@endpush
