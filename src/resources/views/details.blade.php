@extends('layouts.app')

@section('content')
<!-- BEGIN SIDEBPANEL-->

<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <!-- <h3 class="brand">HyperTube 42</h3> -->

       <img src="{{ asset('assets/img/logo1.png') }}" alt="logo" class="brand" data-src="{{ asset('assets/img/logo1.png') }}" data-src-retina={{ asset('assets/img/logo1.png') }} width="78" height="22">
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="#" class="detailed">
                    <span class="title_aside">Genres</span>
                </a>



                <span class="bg-success icon-thumbnail"><i class="fas fa-film"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link" >
                    <span class="title_aside" data="Action">Action</span>
                    <!--<button class="add_button" data="Action">+</button>-->
                </a>
                <span class="icon-thumbnail"><i class="pg-mail"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Adventure">Adventure</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-social"></i></span>
            </li>
            <li>
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Animation">Animation</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-calender"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Comedy">Comedy</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-layouts"></i></span>
            </li>
            <li>
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Crime">Crime</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
            </li>
            <li>
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Documentary">Documentary</span>
                </a>
                <span class="icon-thumbnail">Ui</span>
            </li>
            <li>
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Drama">Drama</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-form"></i></span>

            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Family">Family</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Fantasy">Fantasy</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="History">History</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Horror">Horror</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Music">Music</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Mystery">Mystery</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Romance">Romance</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Science Fiction">Science Fiction</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="TV movie">TV movie</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Thriller">Thriller</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="War">War</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            </li>
            <li class="">
                <a href="" class="genre_direct_link">
                    <span class="title_aside" data="Western">Western</span>
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
            <div class="brand inline   ">
                <!-- <h3>HyperTube 42</h3> -->
                <img src="{{ asset('assets/img/logo1.png') }}" alt="logo" data-src="{{ asset('assets/img/logo1.png') }}" data-src-retina={{ asset('assets/img/logo1.png') }} width="78" height="22">
            </div>
            <!-- START NOTIFICATION LIST -->
            <!-- END NOTIFICATIONS LIST -->
        </div>
        <div class="live_load_container">
            <input id="live_search_input" type="text" name="live_search" placeholder="Fuck" value="" class="live_search" autocomplete="on">
            <button id="reset_button">Reset</button>
        </div>
        <div class="d-flex align-items-center">
            <!-- START User Info-->
            <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
                <span class="semi-bold">David</span> <span class="text-master">Nest</span>
            </div>
            <div class="dropdown pull-right hidden-md-down">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="thumbnail-wrapper d32 circular inline">
					<!--<img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">-->
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


            <div class="social-wrapper">
                <div class="social " data-pages="social">
                    <!-- START JUMBOTRON -->
                    <div class="jumbotron" data-pages="parallax" data-social="cover">
                        <div class="cover-photo" id="backdrop_im">
                            <img alt="Cover photo"  src="{{ asset('assets/img/abstractshit.jpg') }}">
                        </div>
                        <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div class="inner">
                                <div class="pull-bottom bottom-left m-b-40 sm-p-l-15">
                                    <h1 class="text-white no-margin" id="details_movie-title"></h1>
                                    <h5 class="text-white no-margin" id="details_movie-tagline"></h5>

                                </div>
                            </div>
                        </div>
                    </div>

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
                    <!-- END JUMBOTRON -->

    <!-- END PAGE CONTENT WRAPPER -->
</section>
<!-- END PAGE CONTAINER -->
<!--START QUICKVIEW -->
<!-- END OVERLAY -->
@endsection
@push('scripts')
    <script type="text/javascript">
        var movie_id = "{{ $movie_id }}";
    </script>
    <script src="{{ asset('pages/js/details.js') }}"></script>
@endpush