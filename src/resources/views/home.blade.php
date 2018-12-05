@extends('layouts.app')

@section('content')
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
	<!-- BEGIN SIDEBAR MENU HEADER-->
	<div class="sidebar-header">
		<!-- <h3 class="brand">HyperTube 42</h3> -->
		<img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
	</div>
	<!-- END SIDEBAR MENU HEADER-->
	<!-- START SIDEBAR MENU -->
	<div class="sidebar-menu">
		<!-- BEGIN SIDEBAR MENU ITEMS-->
		<ul class="menu-items">
			<li class="m-t-30 ">
				<a href="#" class="detailed">
					<span class="title">{{ __('Genres') }}</span>
				</a>



				<span class="bg-success icon-thumbnail"><i class="fas fa-film"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link" >
					<span class="title_aside" data="Action">{{ __('Action') }}</span>
					<!--<button class="add_button" data="Action">+</button>-->
				</a>
				<span class="icon-thumbnail"><i class="pg-mail"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Adventure">{{ __('Adventure') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-social"></i></span>
			</li>
			<li>
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Animation">{{ __('Animation') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-calender"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Comedy">{{ __('Comedy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
			</li>
			<li>
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Crime">{{ __('Crime') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
			</li>
			<li>
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Documentary">{{ __('Documentary') }}</span>
				</a>
				<span class="icon-thumbnail">Ui</span>
			</li>
			<li>
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Drama">{{ __('Drama') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-form"></i></span>

			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Family">{{ __('Family') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Fantasy">{{ __('Fantasy') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="History">{{ __('History') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Horror">{{ __('Horror') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Music">{{ __('Music') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
				<span class="title_aside" data="Mystery">{{ __('Mystery') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
				<span class="title_aside" data="Romance">{{ __('Romance') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Science Fiction">{{ __('Science Fiction') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="TV movie">{{ __('TV movie') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Thriller">{{ __('Thriller') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="War">{{ __('War') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="" class="genre_direct_link">
					<span class="title_aside" data="Western">{{ __('Western') }}</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>

		</ul>
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
		<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
		</a>
		<!-- END MOBILE SIDEBAR TOGGLE -->
		<div class="">
			<div class="brand inline">
				<!-- <h3>HyperTube 42</h3> -->
				<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
			</div>
			<!-- START NOTIFICATION LIST -->
			<!-- END NOTIFICATIONS LIST -->
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
				<span class="semi-bold">David</span> <span class="text-master">Nest</span>
			</div>
			<div class="dropdown pull-right hidden-md-down">
				<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="thumbnail-wrapper d32 circular inline">
					<img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
					</span>
				</button>
				<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
					<a href="#" class="dropdown-item" data-target="#modalSlideLeft" data-toggle="modal"><i class="pg-settings_small"></i> Settings</a>
					<a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
					<a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();" class="clearfix bg-master-lighter dropdown-item">
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						<span class="pull-left">Logout</span>
						<span class="pull-right"><i class="pg-power"></i></span>
					</a>
				</div>
			</div>
			<!-- END User Info-->
			 <a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block"></a><!--data-toggle="quickview" data-toggle-element="#quickview" -->
		</div>

	</div>
	<!-- END HEADER -->
	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper ">
		<!-- START PAGE CONTENT -->
		<div class="content ">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<!-- START CATEGORY -->
				<div class="search_field">
					<form method="POST" class="search_form" id="main_form">
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
                            <div class = "slider-range_wrapper" id="slider-range_year"></div>
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
							<!--<div class="chosen-container chosen-container-multi chosen-drop chosen-container-active">
								<ul class="chosen-choices">
									<li class="search-field>">

									</li>
								</ul>
								<div class="chosen-drop"></div>
								<ul class="chosen-results"></ul>
							</div>-->

                        </div>
                        <div>
                         <button id="search_submit">{{ __('search') }}</button>
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
					<!-- START GALLERY ITEM -->
					<!--
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT
						-->

				</div>
				<!-- END CATEGORY -->
			</div>
			<!-- START DIALOG -->
			<div id="itemDetails" class="dialog item-details">
				<div class="dialog__overlay"></div>
				<div class="dialog__content">
					<div class="container-fluid">
						<div class="row dialog__overview">
							<div class="col-md-7 no-padding item-slideshow-wrapper full-height">
								<div class="item-slideshow full-height">
									<div class="slide" data-image="assets/img/gallery/item-square.jpg">
									</div>
									<div class="slide" data-image="assets/img/gallery/item-square.jpg">
									</div>
								</div>
							</div>
							<div class="col-md-12 hidden-md-up bg-info-dark">
								<div class="container-xs-height">
									<div class="row row-xs-height">
										<div class="col-8 col-xs-height col-middle no-padding">
											<div class="thumbnail-wrapper d32 circular inline">
												<img width="32" height="32" src="assets/img/profiles/2.jpg" data-src="assets/img/profiles/2.jpg" data-src-retina="assets/img/profiles/2x.jpg" alt="">
											</div>
											<div class="inline m-l-15">
												<p class="text-white no-margin">Alex Nester</p>
												<p class="hint-text text-white no-margin fs-12">Senior UI/UX designer</p>
											</div>
										</div>
										<div class="col-4 col-xs-height col-middle text-right  no-padding">
											<h2 class="bold text-white price font-montserrat">$20.00</h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 p-r-35 p-t-35 p-l-35 full-height item-description">
								<h2 class="semi-bold no-margin font-montserrat">Happy Ninja</h2>
								<p class="rating fs-12 m-t-5">
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</p>
								<p class="fs-13">When it comes to digital design, the lines between functionality, aesthetics, and psychology are inseparably blurred. Without the constraints of the physical world, there’s no natural form to fall back on, and every bit of constraint and affordance must be introduced intentionally. Good design makes a product useful.
								</p>
								<div class="row m-b-20 m-t-20">
									<div class="col-6"><span class="font-montserrat all-caps fs-11">Price ranges</span>
									</div>
									<div class="col-6 text-right">$20.00 - $40.00</div>
								</div>
								<div class="row m-t-20 m-b-10">
									<div class="col-6"><span class="font-montserrat all-caps fs-11">Paint sizes</span>
									</div>
								</div>
								<button class="btn btn-white">S</button>
								<button class="btn btn-white">M</button>
								<button class="btn btn-white">L</button>
								<button class="btn btn-white">XL</button>
								<br>
								<button class="btn btn-primary buy-now">Buy Now</button>
							</div>
						</div>
						<div class="row dialog__footer bg-info-dark hidden-sm-down">
							<div class="col-md-7 full-height separator">
								<div class="container-xs-height">
									<div class="row row-xs-height">
										<div class="col-7 col-xs-height col-middle no-padding">
											<div class="thumbnail-wrapper d48 circular inline">
												<img width="48" height="48" src="assets/img/profiles/2.jpg" data-src="assets/img/profiles/2.jpg" data-src-retina="assets/img/profiles/2x.jpg" alt="">
											</div>
											<div class="inline m-l-15">
												<p class="text-white no-margin">Alex Nester</p>
												<p class="hint-text text-white no-margin fs-12">Senior UI/UX designer</p>
											</div>
										</div>
										<div class="col-5 col-xs-height col-middle text-right  no-padding">
											<h2 class="bold text-white price font-montserrat">$20.00</h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 full-height">
								<ul class="recommended list-inline pull-right m-t-10 m-b-0">
									<li>
										<a href="#"><img src="assets/img/gallery/thumb-1.jpg"></a>
									</li>
									<li>
										<a href="#"><img src="assets/img/gallery/thumb-2.jpg"></a>
									</li>
									<li>
										<a href="#"><img src="assets/img/gallery/thumb-3.jpg"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<button class="close action top-right" data-dialog-close><i class="pg-close fs-14"></i>
					</button>
				</div>
			</div>
			<!-- END DIALOG -->
			<div class="quickview-wrapper" id="filters">
				<div class="padding-40 ">
					<a class="builder-close quickview-toggle pg-close" data-toggle="quickview" data-toggle-element="#filters" href="#"></a>
					<form class="" role="form">
						<h5 class="all-caps font-montserrat fs-12 m-b-20">Advance filters</h5>
						<div class="form-group form-group-default ">
							<label>Project</label>
							<input type="email" class="form-control" placeholder="Type of select a label">
						</div>
						<h5 class="all-caps font-montserrat fs-12 m-b-20 m-t-25">Advance filters</h5>
						<div class="radio radio-danger">
							<input type="radio" checked="checked" value="1" name="filter" id="asc">
							<label for="asc">Ascending order</label>
							<br>
							<input type="radio" value="2" name="filter" id="views">
							<label for="views">Most viewed</label>
							<br>
							<input type="radio" value="3" name="filter" id="cost">
							<label for="cost">Cost</label>
							<br>
							<input type="radio" value="4" name="filter" id="latest">
							<label for="latest">Latest</label>
						</div>
						<h5 class="all-caps font-montserrat fs-12 m-b-20 m-t-25">Price range</h5>
						<div class="bg-danger m-b-10" id="slider-margin">
						</div>
						<button class="pull-right btn btn-danger btn-cons m-t-40">Apply</button>
					</form>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT -->
		<!-- END PAGE CONTENT -->
		<!-- START COPYRIGHT -->
		<!-- START CONTAINER FLUID -->
		<!-- START CONTAINER FLUID -->
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

<!-- START OVERLAY -->
<div class="overlay hide" data-pages="search">
	<!-- BEGIN Overlay Content !-->
	<div class="overlay-content has-results m-t-20">
		<!-- BEGIN Overlay Header !-->
		<div class="container-fluid">
			<!-- BEGIN Overlay Logo !-->
			<img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
			<!-- END Overlay Logo !-->
			<!-- BEGIN Overlay Close !-->
			<a href="#" class="close-icon-light overlay-close text-black fs-16">
				<i class="pg-close"></i>
			</a>
			<!-- END Overlay Close !-->
		</div>
		<!-- END Overlay Header !-->
		<div class="container-fluid">
			<!-- BEGIN Overlay Controls !-->
			<br>
			<div class="inline-block">
				<div class="checkbox right">
					<input id="checkboxn" type="checkbox" value="1" checked="checked">
					<label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
				</div>
			</div>
			<div class="inline-block m-l-10">
				<p class="fs-13">Press enter to search</p>
			</div>
			<!-- END Overlay Controls !-->
		</div>
		<!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
		<div class="container-fluid">
			<span>
				<strong>suggestions :</strong>
			</span>
			<span id="overlay-suggestions"></span>
			<br>
			<div class="search-results m-t-40">
				<p class="bold">Pages Search Results</p>
				<div class="row">
					<div class="col-md-6">
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
								<div>
									<img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
								<p class="hint-text">via john smith</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
								<div>T</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
								<p class="hint-text">via pages</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
								<div><i class="fa fa-headphones large-text "></i>
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
								<p class="hint-text">via pagesmix</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
					</div>
					<div class="col-md-6">
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
								<div><i class="fa fa-facebook large-text "></i>
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
								<p class="hint-text">via facebook</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
								<div><i class="fa fa-twitter large-text "></i>
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
								<p class="hint-text">via twitter</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
						<!-- BEGIN Search Result Item !-->
						<div class="">
							<!-- BEGIN Search Result Item Thumbnail !-->
							<div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
								<div><i class="fa fa-google-plus large-text "></i>
								</div>
							</div>
							<!-- END Search Result Item Thumbnail !-->
							<div class="p-l-10 inline p-t-5">
								<h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
								<p class="hint-text">via google plus</p>
							</div>
						</div>
						<!-- END Search Result Item !-->
					</div>
				</div>
			</div>
		</div>
		<!-- END Overlay Search Results !-->
	</div>
	<!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->

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
							<!-- START CONTAINER FLUID -->
							<!-- <div class=" container-fluid   container-fixed-lg"> -->
								<!-- <div class="row"> -->
									
									<!-- <div class="col-md-7"> -->
										<!-- START card -->
										@if ($errors->any())
								      <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								              <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								      </div><br />
								    @endif
										<div class="col-md-12">
											<div class="wrap-custom-file main-image">
												<input type="file" name="avatar" id="image" accept=".gif, .jpg, .png" />
												<label for="image1">
													<span>Select Avatar Image</span>
													<i class="fa fa-plus-circle"></i>
													<a href="#" class="close"></a>
												</label>
											</div>
										</div>

										<div class="card card-transparent">
											<div class="card-block">
												<form id="form-project" role="form" autocomplete="off" method="post" action="{{ route('user.edit_prof') }}">
													@csrf

													<p>Basic Information</p>
													<div class="form-group-attached">
														<div class="form-group form-group-default">
															<label>Username</label>
															<input type="text" class="form-control" name="username" value="{{ $user_info->username }}" required>
														</div>
														<div class="row clearfix">
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>First name</label>
																	<input type="text" class="form-control" name="firstName" value="{{ $user_info->first_name }}" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Last name</label>
																	<input type="text" class="form-control" name="lastName" value="{{ $user_info->last_name }}" required>
																</div>
															</div>
														</div>
													</div>
													<div class="m-t-10">
														<!-- <form class="m-t-10" role="form"> -->
				                      <div class="form-group form-group-default form-group-default-select2">
				                        <label class="">Select prefered language</label>
				                        <select class="full-width" name="lang" id="select2insidemodal" data-init-plugin="select2">
						                      <option value="en">English</option>
						                      <option value="ua">Ukrainian</option>
						                    </select>
				                      </div>
				                    <!-- </form> -->
													</div>
<<<<<<< HEAD
													<br>
													<p class="m-t-10">Account Information</p>
													<div class="m-t-10">
			                      <div class="form-group form-group-default">
			                        <label class="">Email</label>
			                        <input type="email" class="form-control" value="{{ $user_info->email }}" name="email">
			                      </div>
=======
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
>>>>>>> 9fe214a47d4817f5530dbad166a7d58facb1e88a
													</div>
													<div class="form-group-attached">
														<div class="form-group form-group-default">
															<label>Old Password</label>
															<input type="password" class="form-control" name="oldPass" placeholder="To change password type an old one here">
														</div>
														<div class="row clearfix">
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>New Password</label>
																	<input type="password" class="form-control" name="newPassword" placeholder="Minimum of 6 Charactors">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Repeat New Password</label>
																	<input type="password" class="form-control" name="newPassword_confirmation" placeholder="Confirm new password">
																</div>
															</div>
														</div>
													</div>
													<br>
													<br>
													<button class="btn btn-success" type="submit">Update Profile</button>
												</form>

												@if ($message = Session::get('success'))
								        <div class="alert alert-success alert-block">
								            <button type="button" class="close" data-dismiss="alert">×</button>
								            <strong>{{ $message }}</strong>
								        </div>
								        <img src="avatar_img/{{ Session::get('image') }}">
								        @endif

								        @if (count($errors) > 0)
								            <div class="alert alert-danger">
								                <strong>Whoops!</strong> There were some problems with your input.
								                <ul>
								                    @foreach ($errors->all() as $error)
								                        <li>{{ $error }}</li>
								                    @endforeach
								                </ul>
								            </div>
								        @endif

								  

								        <form action="{{ route('user.upload_avatar') }}" method="POST" enctype="multipart/form-data">
							            @csrf
							            <div class="row">
							                <div class="col-md-6">
							                  <input type="file" name="image" class="form-control">
							                </div>
							                <div class="col-md-6">
							                  <button type="submit" class="btn btn-success">Upload</button>
							                </div>
							            </div>
								        </form>

											</div>
										</div>
										<!-- END card -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
							<!-- END CONTAINER FLUID -->
							<!-- <h5 class="text-primary ">Before you <span class="semi-bold">proceed</span>, you have to login to make the necessary changes</h5>
							<br>
							<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Continue</button>
							<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button> -->
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

@endsection
@push('scripts')
	<script src="{{ asset('assets/js/gallery.js') }}" type="text/javascript"></script>
@endpush
