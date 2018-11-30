@extends('layouts.app')

@section('content')
<div id="details_response"></div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var movie_id = {{ $movie_id }};
    </script>
    <script src="{{ asset('pages/js/details.js') }}"></script>
@endpush