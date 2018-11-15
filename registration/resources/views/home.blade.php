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
			<!-- START JUMBOTRON -->
			<div class="jumbotron" data-pages="parallax">
				<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
					<div class="inner">
						<!-- START BREADCRUMB -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">HyperTube</a></li>
							<li class="breadcrumb-item active">Blank template</li>
						</ol>
						<!-- END BREADCRUMB -->
					</div>
				</div>
			</div>
			<!-- END JUMBOTRON -->
			<!-- START CONTAINER FLUID -->
			<div class=" container-fluid   container-fixed-lg">
				<!-- BEGIN PlACE PAGE CONTENT HERE -->







				<!-- END PLACE PAGE CONTENT HERE -->
			</div>
			<!-- END CONTAINER FLUID -->
		</div>
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

@endsection
