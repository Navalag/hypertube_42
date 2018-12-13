<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta charset="utf-8" />
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Hypertube 42</title>
		
		<!-- <link rel="icon" type="image/x-icon" href="favicon.ico" /> -->

		<!-- meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<meta content="" name="description" />
		<meta content="" name="author" />

		<!--  -->
		<!-- <link class="main-stylesheet" href="{{ asset('assets/css/bulma.css') }}" rel="stylesheet" type="text/css" /> -->
		<link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/jquery-metrojs/MetroJs.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/codrops-dialogFx/dialog.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/codrops-dialogFx/dialog-sandra.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/plugins/jquery-nouislider/jquery.nouislider.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('pages/css/custom.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/plugins/codrops-stepsform/css/component.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css">

		<link href="{{ asset('assets/js/chosen/chosen.css') }}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css">
		<link class="main-stylesheet" href="{{ asset('pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

	</head>
	<body class="fixed-header ">
		
		@yield('content')

		<!-- BEGIN VENDOR JS -->
		<script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/tether/js/tether.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-metrojs/MetroJs.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/codrops-dialogFx/dialogFx.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-nouislider/jquery.nouislider.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-nouislider/jquery.liblink.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
		<!-- END VENDOR JS -->
		<!-- BEGIN CORE TEMPLATE JS -->
		<script src="{{ asset('pages/js/pages.js') }}"></script>
		<!-- END CORE TEMPLATE JS -->
		<!-- BEGIN PAGE LEVEL JS -->
		<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" type="text/javascript"></script>
		<script src="{{ asset('assets/js/chosen/chosen.jquery.js') }}"></script>
		<script src="{{ asset('pages/js/gap.js') }}"></script>
		@stack('scripts')

	</body>
</html>
