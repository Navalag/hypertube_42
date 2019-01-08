@extends('layouts.app')
<div class="header ">
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu menu_button" data-toggle="sidebar"></a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="logo_container">
        <div class="brand inline">
            <a href="/"><h2 class="logo"><b>HyperTube</b><i class="logo-fa fas fa-play-circle"></i></h2></a>
            <!-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> -->
        </div>
    </div>
</div>
@section('content')
<section class="pen_container">
    <p>For a hacking attempt you are going to jail</p>
    <img src="{{ asset('assets/img/fbi.gif') }}">
</section>
@include('layouts.footer')
@endsection