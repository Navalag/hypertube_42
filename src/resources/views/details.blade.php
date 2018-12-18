@extends('layouts.app')

@section('content')
<!-- BEGIN SIDEBPANEL-->
	@include('layouts.menu')
<!-- END SIDEBPANEL-->
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
							<img alt="Cover photo" src="https://image.tmdb.org/t/p/original/{{ $details['backdrop_path'] }}" />
						</div>
						<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
							<div class="inner">
								<div class="pull-bottom bottom-left m-b-40 sm-p-l-15">
									<h1 class="text-white no-margin" id="details_movie-title">{{ $details['title'] }}</h1>
									<h5 class="text-white no-margin" id="details_movie-tagline">{{ $details['tagline'] }}</h5>
								</div>
							</div>
						</div>
					</div>
					<!-- END JUMBOTRON -->
					<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
						<div class="feed">
							<!-- START DAY -->
							<div class="day" data-social="day">
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<!-- START CONTAINER FLUID -->
									<!-- <div class="container-fluid p-t-30 p-b-30 "> -->
										<div class="row">
											<div class="col-lg-6">
												<p id="movie-overview" class="no-margin fs-16">{{ $details['overview'] }}</p>
											</div>
											<div class="col-lg-6">
												<h5 class="no-margin p-b-5">Grade - <span id="grade_response">{{ $details['vote_average'] }}</span></h5>
												<h5 class="no-margin p-b-5">Release - <span id="year_response">{{ $details['release_date'] }}</span></h5>
												<h5 class="no-margin p-b-5">Budget - <span id="budget_response">${{ $details['budget'] }}</span></h5>
												<h5 class="no-margin p-b-5">Revenue - <span id="revenue_response">${{ $details['revenue'] }}</span></h5>
												<h5 class="no-margin p-b-5">Original Language - <span id="lang_response">{{ $details['original_language'] }}</span></h5>
												<h5 class="no-margin p-b-5">Runtime - <span id="runtime_response">{{ $details['runtime'] }} min</span></h5>
											</div>
										</div>
									<!-- </div> -->
									<!-- END CONTAINER FLUID -->
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<h3 class="no-margin p-b-5">Top Billed Cast</h3>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								@foreach(array_slice($cast_details['cast'], 0, 8) as $cast)
									<div class="card social-card share share-other col1" data-social="item">
										<div class="card-content">
											<img alt="Actor img" src="https://image.tmdb.org/t/p/w200/{{ $cast['profile_path'] }}">
											<!-- <div id="cast-info" class="cast_container"></div> -->
										</div>
										<div class="card-description">
											<p>{{ $cast['name'] }}</p>
											<div class="via m-b-10">{{ $cast['character'] }}</div>
											<!-- <h6></h6> -->
										</div>
									</div>
								@endforeach
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<h3 class="no-margin p-b-5">Reviews From Our Users</h3>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card col2 padding-20" data-social="item">
									<form class="simform no-margin" autocomplete="off" data-social="status" action="{{ route('comment.add') }}" method="POST">
										@csrf
										<div class="status-form-inner">
											<ol class="questions">
												<li>
													<span>
														<label for="status-q1">What do you think about this film?</label>
													</span>
													<input id="status-q1" name="comment_body" type="text" />
												</li>
											</ol>
											<!-- /questions -->
											<button class="submit" type="submit">Send answers</button>
											<div class="controls">
												<button class="next"></button>
												<div class="progress"></div>
												<span class="number">
													<span class="number-current"></span>
												<span class="number-total"></span>
												</span>
												<span class="error-message"></span>
											</div>
											<!-- / controls -->
										</div>
										<!-- /simform-inner -->
										<span class="final-message"></span>
										<input name="movie_id" type="hidden" value="{{ $movie_id }}" />
									</form>
									<!-- /simform -->
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								@foreach($comments as $comment)
									<div class="card social-card share  col1" data-social="item">
										<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
										</div>
										<div class="card-header clearfix">
											<div class="user-pic">
												<img alt="Profile Image" width="33" height="33" data-src-retina="{{ $comment->user->photo_src }}" data-src="{{ $comment->user->photo_src }}" src="{{ $comment->user->photo_src }}">
											</div>
											<h5>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h5>
											<h6>Posted a comment</h6>
										</div>
										<div class="card-description">
											<p>{{ $comment->body }}</p>
										</div>
									</div>
								@endforeach
								<!-- END ITEM -->
							</div>
							<!-- END DAY -->
						</div>
						<!-- END FEED -->
					</div>
					<!-- END CONTAINER FLUID -->
				</div>
				<!-- /container -->
			</div>
		</div>
		<!-- END PAGE CONTENT -->
		<!-- START COPYRIGHT -->
		@include('layouts.footer')
		<!-- END COPYRIGHT -->
	<!-- END PAGE CONTAINER -->
	</div>
</div>
@endsection
@push('scripts')
	<script type="text/javascript">
		var movie_id = "{{ $external_ids['tmdb_id'] }}";
	</script>
	<!-- <script src="{{ asset('pages/js/details.js') }}"></script> -->

	<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
	<script src="{{ asset('assets/plugins/codrops-stepsform/js/stepsForm.js') }}"></script>
	<script src="{{ asset('pages/js/pages.social.js') }}"></script>
	
	<!-- <script src="{{ asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}"></script> -->
	<!-- <script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script> -->
@endpush
