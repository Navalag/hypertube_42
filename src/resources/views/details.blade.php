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
							@if ($details['backdrop_path'])
								<img alt="Cover photo" src="https://image.tmdb.org/t/p/original/{{ $details['backdrop_path'] }}" />
							@else
								<img alt="Cover photo" src="https://picsum.photos/1000/500?image=992" />
							@endif
						</div>
						<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
							<div class="inner">
								<div class="pull-bottom bottom-left m-b-40 sm-p-l-15">
									@if ($type == "movies")
									<h1 class="text-white no-margin" id="details_movie-title">{{ $details['title'] }}</h1>
									<h5 class="text-white no-margin" id="details_movie-tagline">{{ $details['tagline'] }}</h5>
									@elseif ($type == "tvshows")
									<h1 class="text-white no-margin" id="details_movie-title">{{ $details['name'] }}</h1>
									@endif
								</div>
							</div>
						</div>
					</div>
					<!-- END JUMBOTRON -->

					<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
						<div class="feed">
							<!-- START DAY -->
							<div class="day" data-social="day">
								<!-- START ITEM -->
								<div class="card social-card no-border bg-transparent col4" data-social="item">
									<div class="card-description">
										@if($details['overview'])
											<p class="no-margin fs-16">{{ $details['overview'] }}</p>
										@else
											<div class="no_result_overview"><img src="{{ asset('assets/img/no-results_loupe.png') }}"></div>
										@endif
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								@if ($type == "movies")
								<div class="card social-card status col2" data-social="item">
									<h4 class="no-margin p-b-5">{{ __('Grade') }} - <span id="grade_response">{{ $details['vote_average'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Release') }} - <span id="year_response">{{ $details['release_date'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Budget') }} - <span id="budget_response">${{ $details['budget'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Revenue') }} - <span id="revenue_response">${{ $details['revenue'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Original Language') }} - <span id="lang_response">{{ $details['original_language'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Runtime') }} - <span id="runtime_response">{{ $details['runtime'] }} {{ __('min') }}</span></h4>
								</div>
								@elseif ($type == "tvshows")
								<div class="card social-card status col2" data-social="item">
									<h4 class="no-margin p-b-5">{{ __('Grade') }} - <span id="grade_response">{{ $details['vote_average'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Release') }} - <span id="year_response">{{ $details['first_air_date'] }}</span></h4>
									<h4 class="no-margin p-b-5">{{ __('Original Language') }} - <span id="lang_response">{{ $details['original_language'] }}</span></h4>
								</div>
								@endif
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<section id="links_response" class="links-response">
										<div class="no_result_links"><img src="{{ asset('assets/img/no_result_cactus.png') }}"></div>
									</section>
								</div>
								<div class="card no-border bg-transparent full-width" data-social="item">
									<div style="width: 500px">
							        	<!-- Plyr -->
								        <video id="player" width="320" height="240" controls>
								        </video>
								    </div>
								</div>
								<div class="card no-border bg-transparent full-width" data-social="item">
									<h3 class="no-margin p-b-5">{{ __('Top Billed Cast') }}</h3>
								</div>

								<!-- END ITEM -->
								<!-- START ITEM -->
								@foreach(array_slice($cast_details['cast'], 0, 6) as $cast)
									<div class="card social-card share col1" data-social="item">
										<div class="card-content">
											@if ($cast['profile_path'])
												<img alt="Actor img" src="https://image.tmdb.org/t/p/w200/{{ $cast['profile_path'] }}">
											@else
												<img alt="Actor img" src="https://imgplaceholder.com/138x207/cccccc/757575/glyphicon-user/">
											@endif
										</div>
										<div class="card-description">
											<h6><span class="semi-bold">{{ $cast['name'] }}</span></h6>
											<p class="via m-b-10">{{ $cast['character'] }}</p>
										</div>
									</div>
								@endforeach
								<!-- END ITEM -->
								<!-- START ITEM -->

								<div class="card no-border bg-transparent full-width" data-social="item">
									<h3 class="no-margin p-b-5">{{ __('Reviews From Our Users') }}</h3>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card col4 padding-20" data-social="item">
									<form class="simform no-margin" autocomplete="off" data-social="status" action="{{ route('comment.add') }}" method="POST">
										@csrf
										<div class="status-form-inner">
											<ol class="questions">
												<li>
													<span>
														<label for="status-q1">{{ __('What do you think about this film?') }}</label>
													</span>
													<input id="status-q1" name="comment_body" type="text" />
												</li>
											</ol>
											<!-- /questions -->
											<button class="submit" type="submit">{{ __('Send answers') }}</button>
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
									<div class="card social-card share col2" data-social="item">
										<div class="card-header clearfix">
											<div class="user-pic">
												@if ($comment->user->photo_src)
													<img alt="Profile Image" width="33" height="33" data-src-retina="{{ url($comment->user->photo_src) }}" data-src="{{ url($comment->user->photo_src) }}" src="{{ url($comment->user->photo_src) }}">
												@else
													<img alt="Profile Image" width="33" height="33" data-src-retina="{{ asset('assets/img/default-avatar-2.png') }}" data-src="{{ asset('assets/img/default-avatar-2.png') }}" src="{{ asset('assets/img/default-avatar-2.png') }}">
											@endif
											</div>
											<h5>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h5>
											<h6>{{ __('Posted a comment') }}</h6>
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
		var imdb_id = "{{ $external_ids['imdb_id'] }}";
		var type = "{{ $type }}";
		var title = "{{ $title }}";
		var lang = "{{ $lang }}";
		var player_preview_img = "{{ $player_preview_img }}";
		(lang == "English") ? lang = "en-US" : 0;
		(lang == "Українська") ? lang = "uk-UA" : 0;
	</script>
	<!-- <script src="{{ asset('pages/js/details.js') }}"></script> -->
	<script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
	<script src="{{ asset('assets/plugins/codrops-stepsform/js/stepsForm.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}"></script>

	<script src="{{ asset('pages/js/pages.social.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/plyr/3.1.0/plyr.min.js"></script>
	<script src="{{ asset('pages/js/details.js') }}"></script>
@endpush
