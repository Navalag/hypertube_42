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
											<p>{{ $cast['character'] }}</p>
											<div class="via m-b-10">{{ $cast['name'] }}</div>
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
									<form class="simform no-margin" autocomplete="off" data-social="status">
										<div class="status-form-inner">
											<ol class="questions">
												<li>
													<span>
														<label for="status-q1">What's on your mind?</label>
													</span>
													<input id="status-q1" name="q1" type="text" />
												</li>
												<li>
													<span>
														<label for="status-q2">What are you feeling?</label>
													</span>
													<input id="status-q2" name="q2" type="text" />
												</li>
												<li>
													<span>
														<label for="status-q3">What's your location?</label>
													</span>
													<input id="status-q3" name="q3" type="text" />
												</li>
												<li>
													<span>
														<label for="status-q4">Who are you with?</label>
													</span>
													<input id="status-q4" name="q4" type="text" />
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
									</form>
									<!-- /simform -->
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card status col2" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<h5>David Nester updated his status
										<span class="hint-text">few seconds ago</span>
									</h5>
									<h2>Earned my first salary bonus for the best design of the year award.</h2>
									<ul class="reactions">
										<li><a href="#">5,345 <i class="fa fa-comment-o"></i></a>
										</li>
										<li><a href="#">23K <i class="fa fa-heart-o"></i></a>
										</li>
									</ul>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-header clearfix">
										<div class="user-pic">
											<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg">
										</div>
										<h5>Jeff Curtis</h5>
										<h6>Shared a Tweet <span class="location semi-bold"><i class="fa fa-map-marker"></i> SF, California</span></h6>
									</div>
									<div class="card-description">
										<p>What you think, you become. What you feel, you attract. What you imagine, you create - Buddha. <a href="#">#quote</a></p>
										<div class="via">via Twitter</div>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-header clearfix">
										<div class="user-pic">
											<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg">
										</div>
										<h5>Andy Young</h5>
										<h6>Updated his status
											<span class="location semi-bold"><i class="fa fa-map-marker"></i> NYC, New York</span>
										</h6>
									</div>
									<div class="card-description">
										<p>What a lovely day! I think I should go and play outside.</p>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share share-other col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-content">
										<ul class="buttons ">
											<li>
												<a href="#"><i class="fa fa-expand"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa fa-heart-o"></i></a>
											</li>
										</ul>
										<img alt="Quote" src="assets/img/social/quote.jpg">
									</div>
									<div class="card-description">
										<p>Like if you agree</p>
									</div>
									<div class="card-footer clearfix">
										<div class="time">few seconds ago</div>
										<ul class="reactions">
											<li><a href="#">5,345 <i class="fa fa-comment-o"></i></a>
											</li>
											<li><a href="#">23K <i class="fa fa-heart-o"></i></a>
											</li>
										</ul>
									</div>
									<div class="card-header clearfix last">
										<div class="user-pic">
											<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/7x.jpg" data-src="assets/img/profiles/7.jpg" src="assets/img/profiles/7x.jpg">
										</div>
										<h5>Tracy Brooks</h5>
										<h6>Shared a photo on your wall</h6>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share share-other col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-content">
										<ul class="buttons ">
											<li>
												<a href="#"><i class="fa fa-expand"></i>
							</a>
											</li>
											<li>
												<a href="#"><i class="fa fa-heart-o"></i>
							</a>
											</li>
										</ul>
										<img alt="Person photo" src="assets/img/social/person-1.jpg">
									</div>
									<div class="card-description">
										<p><a href="#">#TBT</a> :D</p>
									</div>
									<div class="card-footer clearfix">
										<div class="time">few seconds ago</div>
										<ul class="reactions">
											<li><a href="#">5,345 <i class="fa fa-comment-o"></i></a>
											</li>
											<li><a href="#">23K <i class="fa fa-heart-o"></i></a>
											</li>
										</ul>
									</div>
									<div class="card-header clearfix last">
										<div class="user-pic">
											<img alt="Avatar" width="33" height="33" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar_small2x.jpg">
										</div>
										<h5>David Nester</h5>
										<h6>Shared a link on your wall</h6>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-header clearfix">
										<div class="user-pic">
											<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg">
										</div>
										<h5>Nathaniel Hamilton</h5>
										<h6>Shared a Tweet
						<span class="location semi-bold"><i class="icon-map"></i>  NYC, New York</span>
					</h6>
									</div>
									<div class="card-description">
										<p>Testing can show the presense of bugs, but not their absence.</p>
										<div class="via">via Twitter</div>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="circle" data-toggle="tooltip" title="Label" data-container="body">
									</div>
									<div class="card-header clearfix">
										<div class="user-pic">
											<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg">
										</div>
										<h5>Nathaniel Hamilton</h5>
										<h6>Shared a Tweet
						<span class="location semi-bold"><i class="icon-map"></i> NYC, New York</span>
					</h6>
									</div>
									<div class="card-description">
										<p>There is nothing new under the sun, but there are lots of old things we don't know yet.
										</p>
										<div class="via">via Twitter</div>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="card-header ">
										<h5 class="text-complete pull-left fs-12">News <i
							class="fa fa-circle text-complete fs-11"></i></h5>
										<div class="pull-right small hint-text">
											5,345 <i class="fa fa-comment-o"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="card-description">
										<h3>Ebola outbreak: Clinical drug trials to start next month as death toll mounts</h3>
									</div>
									<div class="card-footer clearfix">
										<div class="pull-left">via <span class="text-complete">CNN</span>
										</div>
										<div class="pull-right hint-text">
											Apr 23
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card share  col1" data-social="item">
									<div class="card-header clearfix">
										<h5 class="text-success pull-left fs-12">Stock Market <i
							class="fa fa-circle text-success fs-11"></i></h5>
										<div class="pull-right small hint-text">
											5,345 <i class="fa fa-comment-o"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="card-description">
										<h5 class='hint-text no-margin'>Apple Inc.</h5>
										<h5 class="small hint-text no-margin">NASDAQ: AAPL - Nov 13 8:37 AM ET</h5>
										<h3>111.25 <span class="text-success"><i class="fa fa-sort-up small text-success"></i> 0.15 (0.13%)</span></h3>
									</div>
									<div class="card-footer clearfix">
										<div class="pull-left">by <span class="text-success">John Smith</span>
										</div>
										<div class="pull-right hint-text">
											Apr 23
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
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
	<script src="{{ asset('pages/js/details.js') }}"></script>

	<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
	<script src="{{ asset('assets/plugins/codrops-stepsform/js/stepsForm.js') }}"></script>
	<script src="{{ asset('pages/js/pages.social.min.js') }}"></script>
	
	<!-- <script src="{{ asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}"></script> -->
	<!-- <script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script> -->
@endpush
