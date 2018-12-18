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
					<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
						<div class="feed">
							<!-- START DAY -->
							<div class="day" data-social="day">
								<!-- START ITEM -->
								<div class="card social-card no-border bg-transparent col2" data-social="item">
									<div class="card-description">
										<p class="no-margin fs-16">{{ $details['overview'] }}</p>
									</div>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card social-card status col1" data-social="item">
									<h4 class="no-margin p-b-5">Grade - <span id="grade_response">{{ $details['vote_average'] }}</span></h4>
									<h4 class="no-margin p-b-5">Release - <span id="year_response">{{ $details['release_date'] }}</span></h4>
									<h4 class="no-margin p-b-5">Budget - <span id="budget_response">${{ $details['budget'] }}</span></h4>
									<h4 class="no-margin p-b-5">Revenue - <span id="revenue_response">${{ $details['revenue'] }}</span></h4>
									<h4 class="no-margin p-b-5">Original Language - <span id="lang_response">{{ $details['original_language'] }}</span></h4>
									<h4 class="no-margin p-b-5">Runtime - <span id="runtime_response">{{ $details['runtime'] }} min</span></h4>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<h3 class="no-margin p-b-5">Top Billed Cast</h3>
								</div>
								<!-- END ITEM -->
								<!-- START ITEM -->
								<div class="card no-border bg-transparent full-width" data-social="item">
									<!-- <div class="container-fluid"> -->
										<div class="row">
										@foreach(array_slice($cast_details['cast'], 0, 6) as $cast)
											<div class="col-lg-2">
												<div class="card">
												  <img class="card-img-top" src="https://image.tmdb.org/t/p/w200/{{ $cast['profile_path'] }}" alt="Actor img">
												  <div class="card-block">
												    <h5><span class="semi-bold">{{ $cast['name'] }}</span></h5>
												    <p>{{ $cast['character'] }}</p>
												  </div>
												</div>
											</div>
										@endforeach
										</div>
									<!-- </div> -->
								</div>
								<!-- <div class="container">
									<div class="card-columns">
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/420/200">
											<div class="card-block">
												<h4 class="card-title">Boating is the new canoeing</h4>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/414/200">
											<div class="card-block">
												<h4 class="card-title">This almost brought the Internet to its knees</h4>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/412/200">
											<div class="card-block">
												<h4 class="card-title">Try not to gasp when you find out who painted this.</h4>
												<span class="badge badge-success">Health</span>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/411/200">
											<div class="card-block">
												<h4 class="card-title">Lower back pain treatments</h4>
												<span class="badge badge-warning">Health</span>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/415/200">
											<div class="card-block">
												<h4 class="card-title">How to keep a straight face</h4>
												<span class="badge badge-primary">Social</span>
												<p class="card-text">Keeping a straight face in a conversation can be more difficult than it seems.</p>
											</div>
										</div>		
										<div class="card p-3">
											<blockquote class="card-block card-blockquote">
												<p>Of course I talk to myself, sometimes I need an expert opinion.</p>
												<footer>
													<small class="text-muted">William James Murray <cite title="Source Title">Caddyshack</cite></small>
												</footer>
											</blockquote>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/360/200">
											<div class="card-block">
												<h4 class="card-title">Best Horror Movies of 2017</h4>
												<span class="badge badge-info">Movies</span>
												<p class="card-text"></p>
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
											</div>
										</div>
										<div class="card card-inverse card-primary p-3 text-center">
											<blockquote class="card-blockquote">
												<p>Movie acting suits me because I only need to be good for ninety seconds at a time.</p>
												<footer>
													<small>Billy Murray</small>
												</footer>
											</blockquote>
										</div>
										<div class="card text-center">
											<div class="card-block">
												<h4 class="card-title">Deep-thoughts</h4>
												<p class="card-text">Sometimes I snore, like when I get really tired.</p>
												<p class="card-text"><small class="text-muted">Willy M Murray</small></p>
											</div>
										</div>
										<div class="card"><img alt="Card image" class="card-img img-fluid" src="https://www.fillmurray.com/400/200"></div>
										<div class="card p-3 text-right">
											<blockquote class="card-blockquote">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
												<footer>
													<small class="text-muted">Someone famous in <cite title="Source Title">Source Title</cite></small>
												</footer>
											</blockquote>
										</div>
										<div class="card">
											<div class="card-block">
												<h4 class="card-title">Golf Tales</h4>
												<p class="card-text">When you see grown men near to tears because they've missed hitting a little white ball into a hole from three feet, it makes you laugh.</p>
												<p class="card-text"><small class="text-muted">Bill M</small></p>
											</div>
										</div>		
									</div>
									<div class="card-columns">
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/414/200">
											<div class="card-block">
												<h4 class="card-title">This almost brought the Internet to its knees</h4>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/412/200">
											<div class="card-block">
												<h4 class="card-title">Try not to gasp when you find out who painted this.</h4>
												<span class="badge badge-success">Health</span>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/411/200">
											<div class="card-block">
												<h4 class="card-title">Lower back pain treatments</h4>
												<span class="badge badge-warning">Health</span>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>
										<div class="card card-inverse card-primary p-3 text-center">
											<blockquote class="card-blockquote">
												<p>Movie acting suits me because I only need to be good for ninety seconds at a time.</p>
												<footer>
													<small>Billy Murray</small>
												</footer>
											</blockquote>
										</div>		
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/415/200">
											<div class="card-block">
												<h4 class="card-title">How to keep a straight face</h4>
												<span class="badge badge-primary">Social</span>
												<p class="card-text">Keeping a straight face in a conversation can be more difficult than it seems.</p>
											</div>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/420/200">
											<div class="card-block">
												<h4 class="card-title">Boating is the new canoeing</h4>
												<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
											</div>
										</div>		
										<div class="card">
											<div class="card-block">
												<h4 class="card-title">Golf Tales</h4>
												<p class="card-text">When you see grown men near to tears because they've missed hitting a little white ball into a hole from three feet, it makes you laugh.</p>
												<p class="card-text"><small class="text-muted">Bill M</small></p>
											</div>
										</div>			
										<div class="card p-3">
											<blockquote class="card-block card-blockquote">
												<p>Of course I talk to myself, sometimes I need an expert opinion.</p>
												<footer>
													<small class="text-muted">William James Murray <cite title="Source Title">Caddyshack</cite></small>
												</footer>
											</blockquote>
										</div>
										<div class="card">
											<img alt="Card image cap" class="card-img-top img-fluid" src="https://www.fillmurray.com/360/200">
											<div class="card-block">
												<h4 class="card-title">Best Horror Movies of 2017</h4>
												<span class="badge badge-info">Movies</span>
												<p class="card-text"></p>
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
											</div>
										</div>
										<div class="card text-center">
											<div class="card-block">
												<h4 class="card-title">Deep-thoughts</h4>
												<p class="card-text">Sometimes I snore, like when I get really tired.</p>
												<p class="card-text"><small class="text-muted">Willy M Murray</small></p>
											</div>
										</div>
										<div class="card"><img alt="Card image" class="card-img img-fluid" src="https://www.fillmurray.com/400/200"></div>
										<div class="card p-3 text-right">
											<blockquote class="card-blockquote">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
												<footer>
													<small class="text-muted">Someone famous in <cite title="Source Title">Source Title</cite></small>
												</footer>
											</blockquote>
										</div>
									
									</div>	
								</div> -->
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
									<div class="card social-card share col1" data-social="item">
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
