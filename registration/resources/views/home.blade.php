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
					<span class="title">Dashboard</span>
					<span class="details">12 New Updates</span>
				</a>
				<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
			</li>
			<li class="">
				<a href="#" class="detailed">
					<span class="title">Email</span>
					<span class="details">234 New Emails</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-mail"></i></span>
			</li>
			<li class="">
				<a href="#"><span class="title">Social</span></a>
				<span class="icon-thumbnail"><i class="pg-social"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Calendar</span>
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-calender"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Basic</a>
						<span class="icon-thumbnail">c</span>
					</li>
					<li class="">
						<a href="#">Languages</a>
						<span class="icon-thumbnail">L</span>
					</li>
					<li class="">
						<a href="#">Month</a>
						<span class="icon-thumbnail">M</span>
					</li>
					<li class="">
						<a href="#">Lazy load</a>
						<span class="icon-thumbnail">La</span>
					</li>
					<li class="">
						<a href="#" target="_blank">Documentation</a>
						<span class="icon-thumbnail">D</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#">
					<span class="title">Builder</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Layouts</span>
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Default</a>
						<span class="icon-thumbnail">dl</span>
					</li>
					<li class="">
						<a href="#">Secondary</a>
						<span class="icon-thumbnail">sl</span>
					</li>
					<li class="">
						<a href="#">Boxed</a>
						<span class="icon-thumbnail">bl</span>
					</li>
					<li class="">
						<a href="#">RTL</a>
						<span class="icon-thumbnail">rl</span>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;"><span class="title">UI Elements</span>
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail">Ui</span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Color</a>
						<span class="icon-thumbnail">c</span>
					</li>
					<li class="">
						<a href="#">Typography</a>
						<span class="icon-thumbnail">t</span>
					</li>
					<li class="">
						<a href="#">Icons</a>
						<span class="icon-thumbnail">i</span>
					</li>
					<li class="">
						<a href="#">Buttons</a>
						<span class="icon-thumbnail">b</span>
					</li>
					<li class="">
						<a href="#">Notifications</a>
						<span class="icon-thumbnail">n</span>
					</li>
					<li class="">
						<a href="#">Modals</a>
						<span class="icon-thumbnail">m</span>
					</li>
					<li class="">
						<a href="#">Progress &amp; Activity</a>
						<span class="icon-thumbnail">pa</span>
					</li>
					<li class="">
						<a href="#">Tabs &amp; Accordions</a>
						<span class="icon-thumbnail">ta</span>
					</li>
					<li class="">
						<a href="#">Sliders</a>
						<span class="icon-thumbnail">s</span>
					</li>
					<li class="">
						<a href="#">Tree View</a>
						<span class="icon-thumbnail">tv</span>
					</li>
					<li class="">
						<a href="#">Nestable</a>
						<span class="icon-thumbnail">ns</span>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;">
					<span class="title">Forms</span>
					<span class=" arrow"></span>
				</a>
				<span class="icon-thumbnail"><i class="pg-form"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Form Elements</a>
						<span class="icon-thumbnail">fe</span>
					</li>
					<li class="">
						<a href="#">Form Layouts</a>
						<span class="icon-thumbnail">fl</span>
					</li>
					<li class="">
						<a href="#">Form Wizard</a>
						<span class="icon-thumbnail">fw</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#">
					<span class="title">Cards</span>
				</a>
				<span class="icon-thumbnail"><i class="pg-grid"></i></span>
			</li>
			<li class="">
				<a href="#">
					<span class="title">Views</span>
				</a>
				<span class="icon-thumbnail"><i class="pg pg-ui"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Tables</span>
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-tables"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Basic Tables</a>
						<span class="icon-thumbnail">bt</span>
					</li>
					<li class="">
						<a href="#">Data Tables</a>
						<span class="icon-thumbnail">dt</span>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Maps</span> 
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-map"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Google Maps</a>
						<span class="icon-thumbnail">gm</span>
					</li>
					<li class="">
						<a href="#">Vector Maps</a>
						<span class="icon-thumbnail">vm</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#"><span class="title">Charts</span></a>
				<span class="icon-thumbnail"><i class="pg-charts"></i></span>
			</li>
			<li>
				<a href="javascript:;"><span class="title">Extra</span>
				<span class=" arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-bag"></i></span>
				<ul class="sub-menu">
					<li class="">
						<a href="#">Invoice</a>
						<span class="icon-thumbnail">in</span>
					</li>
					<li class="">
						<a href="#">404 Page</a>
						<span class="icon-thumbnail">pg</span>
					</li>
					<li class="">
						<a href="#">500 Page</a>
						<span class="icon-thumbnail">pg</span>
					</li>
					<li class="">
						<a href="#">Blank Page</a>
						<span class="icon-thumbnail">bp</span>
					</li>
					<li class="">
						<a href="#">Login</a>
						<span class="icon-thumbnail">l</span>
					</li>
					<li class="">
						<a href="#">Register</a>
						<span class="icon-thumbnail">re</span>
					</li>
					<li class="">
						<a href="#">Lockscreen</a>
						<span class="icon-thumbnail">ls</span>
					</li>
					<li class="">
						<a href="#">Gallery</a>
						<span class="icon-thumbnail">gl</span>
					</li>
					<li class="">
						<a href="#">Timeline</a>
						<span class="icon-thumbnail">t</span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;"><span class="title">Menu Levels</span>
				<span class="arrow"></span></a>
				<span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
				<ul class="sub-menu">
					<li>
						<a href="javascript:;">Level 1</a>
						<span class="icon-thumbnail">L1</span>
					</li>
					<li>
						<a href="javascript:;"><span class="title">Level 2</span>
						<span class="arrow"></span></a>
						<span class="icon-thumbnail">L2</span>
						<ul class="sub-menu">
							<li>
								<a href="javascript:;">Sub Menu</a>
								<span class="icon-thumbnail">Sm</span>
							</li>
							<li>
								<a href="ujavascript:;">Sub Menu</a>
								<span class="icon-thumbnail">Sm</span>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#"><span class="title">Docs</span></a>
				<span class="icon-thumbnail"><i class="pg-note"></i></span>
			</li>
			<li class="">
				<a href="#"><span class="title">Changelog</span></a>
				<span class="icon-thumbnail">Cl</span>
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
			<div class="brand inline   ">
				<!-- <h3>HyperTube 42</h3> -->
				<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
			</div>
			<!-- START NOTIFICATION LIST -->
			<ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
				<li class="p-r-10 inline">
					<div class="dropdown">
						<a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">
							<span class="bubble"></span>
						</a>
					</div>
				</li>
				<li class="p-r-10 inline">
					<a href="#" class="header-icon pg pg-link"></a>
				</li>
				<li class="p-r-10 inline">
					<a href="#" class="header-icon pg pg-thumbs"></a>
				</li>
			</ul>
			<!-- END NOTIFICATIONS LIST -->
			<a href="#" class="search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>
		</div>
		<div class="d-flex align-items-center">
			<!-- START User Info-->
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
					<a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
					<a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
					<a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a>
					<a href="#" class="clearfix bg-master-lighter dropdown-item">
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
				<div class="gallery">
					<div class="gallery-filters p-t-20 p-b-10">
						<ul class="list-inline text-right">
							<li class="hint-text">Sort by: </li>
							<li><a href="#" class="active text-master p-r-5 p-l-5">Name</a></li>
							<li><a href="#" class="text-master hint-text p-r-5 p-l-5">Views</a></li>
							<li><a href="#" class="text-master hint-text p-r-5 p-l-5">Cost</a></li>
							<li>
								<button class="btn btn-primary m-l-10" data-toggle="filters">More filters</button>
							</li>
						</ul>
					</div>
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item first" data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/1.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="2" data-height="2">
						<!-- START PREVIEW -->
						<div class="live-tile slide" data-speed="750" data-delay="4000" data-mode="carousel">
							<div class="slide-front">
								<img src="assets/img/gallery/2_1.jpg" alt="" class="image-responsive-height">
							</div>
							<div class="slide-back">
								<img src="assets/img/gallery/2_2.jpg" alt="" class="image-responsive-height">
							</div>
						</div>
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info more-content">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<h3 class="pull-left bold text-white no-margin">Happy Ninja</h3>
										<h3 class="pull-right semi-bold text-white font-montserrat bold no-margin">$25.00</h3>
										<div class="clearfix"></div>
										<span class="hint-text pull-left text-white">Hand and mind crafted</span>
										<div class="clearfix"></div>
									</div>
									<div class="">
										<h5 class="text-white light">Most Sold Item in the marketplace</h5>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/3.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/4.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/5.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/6.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/7.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/8.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/9.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/10.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/11.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/12.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/13.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
					<!-- START GALLERY ITEM -->
					<!-- 
								FOR DEMO PURPOSES, FIRST GALLERY ITEM (.first) IS HIDDEN 
								FOR SCREENS <920px. PLEASE REMOVE THE CLASS 'first' WHEN YOU IMPLEMENT 
						-->
					<div class="gallery-item " data-width="1" data-height="1">
						<!-- START PREVIEW -->
						<img src="assets/img/gallery/14.jpg" alt="" class="image-responsive-height">
						<!-- END PREVIEW -->
						<!-- START ITEM OVERLAY DESCRIPTION -->
						<div class="overlayer bottom-left full-width">
							<div class="overlayer-wrapper item-info ">
								<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
									<div class="">
										<p class="pull-left bold text-white fs-14 p-t-10">Happy Ninja</p>
										<h5 class="pull-right semi-bold text-white font-montserrat bold">$25.00</h5>
										<div class="clearfix"></div>
									</div>
									<div class="m-t-10">
										<div class="thumbnail-wrapper d32 circular m-t-5">
											<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
										</div>
										<div class="inline m-l-10">
											<p class="no-margin text-white fs-12">Designed by Alex Nester</p>
											<p class="rating">
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star rated"></i>
												<i class="fa fa-star"></i>
											</p>
										</div>
										<div class="pull-right m-t-10">
											<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT OVERLAY DESCRIPTION -->
					</div>
					<!-- END GALLERY ITEM -->
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
					<span class="hint-text">Unit Factory (42 school) project.</span>
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
			<input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
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

@endsection
