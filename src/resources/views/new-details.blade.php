@extends('layouts.app')

@section('content')
<!-- BEGIN SIDEBPANEL-->
	@include('layouts.menu')
<!-- END SIDEBPANEL-->
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
	<!-- START HEADER -->
	@include('layouts.header')
	<!-- END HEADER -->
	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper ">
		<!-- START PAGE CONTENT -->
		<div class="content ">
			<div class="social-wrapper">
				<div class="social " data-pages="social">
					<!-- START JUMBOTRON -->
					<div class="jumbotron" data-pages="parallax" data-social="cover">
						<div class="cover-photo" id="backdrop_im">
							<img alt="Cover photo"  src="{{ asset('assets/img/social/cover.jpg') }}">
						</div>
						<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
							<div class="inner">
								<div class="pull-bottom bottom-left m-b-40 sm-p-l-15">
									<h1 class="text-white no-margin" id="details_movie-title"></h1>
									<h5 class="text-white no-margin" id="details_movie-tagline"></h5>
								</div>
							</div>
						</div>
					</div>
					<!-- END JUMBOTRON -->
					<section class="movie-info_container field is-grouped is-grouped-multiline">
						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Release </span>
								<div id="year_response" class="tag is-info"></div>
							</div>
						</div>

						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Runtime </span>
								<div id="runtime_response" class="tag is-primary"></div>
							</div>
						</div>

						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Language </span>
								<div id="lang_response" class="tag is-link"></div>
							</div>
						</div>

						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Grade </span>
								<div id="grade_response" class="tag is-success"></div>
							</div>
						</div>

						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Budget </span>
								<div id="budget_response" class="tag is-warning"></div>
							</div>
						</div>

						<div class="control">
							<div class="tags has-addons">
								<span class="tag is-dark">Revenue </span>
								<div id="revenue_response" class="tag is-danger"></div>
							</div>
						</div>
					</section>
					<section class="movie-overview-links_container">
						<div class="message is-dark movie-overview_response">
							<div class="message-header">
								<p>Overview</p>
							</div>
							<div id="movie-overview" class="message-body"></div>
						</div>

						<div class="message is-dark movie-links_response">
							<div class="message-header">
								<p>Play movie</p>
							</div>
							<div id="links_response" class="message-body" ></div>
						</div>


					</section>
					<section class="cast-trailer_wrapper">
						<div class="movie-cast-trailer_container">
							<div class=" message cast-crew_wrapper">
								<div class="message-header">
									<p>Cast</p>
								</div>
								<div id="cast-info" class="cast_container"></div>
								<button class="button is-primary show_crew" onclick="get_full_movie_cast()">Show all cast and crew</button>
								<button class="button is-primary show_cast" onclick="get_short_movie_cast()">Show only cast</button>

							</div>
							<div id="trailer" class=" message comments_container">
								<div class="message-header">
									<p>Comments</p>
								</div>
							</div>
						</div>
					</section>
					<section class="player_container">
						<div id="player"></div>
					</section>
					<section id="details_response"></section>

	<!-- END PAGE CONTENT WRAPPER -->
<!-- </section> -->

@endsection
@push('scripts')
	<script type="text/javascript">
		var movie_id = "{{ $movie_id }}";
	</script>
	<script src="{{ asset('pages/js/details.js') }}"></script>

	<script src="{{ asset('assets/plugins/codrops-stepsform/js/stepsForm.js') }}"></script>
	<script src="{{ asset('pages/js/pages.social.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
@endpush