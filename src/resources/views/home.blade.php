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
			<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
				<!-- START CATEGORY -->
				<div class="search_field">
					<div class="switch_buttons">
						<button class="switch btn btn-primary" onclick="switch_type(event);" id="movie_switch" data="movies">Movies</button>
						<button class="switch btn btn-primary" onclick="switch_type(event);" id="tvshows_switch" data="tvshows">TV Shows</button>
					</div>
					<form method="POST" class="search_form" id="movie_form">
						<div class="sort_field">
							<select class="form-control select_sort" name="sort" id="sort_select">
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
							<input  name="rate_gap" id="rate_gap" >
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
						<div class="search_button">
							<button  class="btn btn-primary" id="search_submit">{{ __('search') }}</button>
						</div>
					</form>
					<form method="POST" class="search_form" id="tv_form">
						<div class="sort_field">
							<select class="form-control select_sort " name="sort" id="sort_select_tv">
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
						<div class="search_button">
							<button class="btn btn-primary" id="search_submit_tv">{{ __('search') }}</button>
						</div>
					</form>
					<div id="form-response"></div>
				</div>
				<div class="gallery">
					<div class="genre_list" id="genre_response"></div>
					<div id="load_gif" class="load_gif_container">
						<img src="{{ asset('assets/img/load.gif') }}">
					</div>
					<section id="response"></section>
				</div>
				<!-- END CATEGORY -->
			</div>
			<!-- END PAGE CONTENT -->
			<!-- START COPYRIGHT -->
				@include('layouts.footer')
			<!-- END COPYRIGHT -->
		</div>
	<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
@endsection

@push('scripts')
		<script type="text/javascript">
            var lang = "{{ $lang }}";
			(lang == "English") ? lang = "en-US" : 0;
            (lang == "Українська") ? lang = "uk-UA" : 0;
		</script>
		<script src="{{ asset('pages/js/search.js') }}" type="text/javascript"></script>
		<script src="{{ asset('pages/js/gap.js') }}"></script>
	<!-- <script src="{{ asset('assets/plugins/jquery-nouislider/jquery.nouislider.min.js') }}" type="text/javascript"></script> -->
	<!-- <script src="{{ asset('assets/js/gallery.js') }}" type="text/javascript"></script> -->

@endpush
