@extends('layouts.app')

@section('content')
<section>
    @foreach ($popcorn as $lang)
        @foreach ($lang as $key => $value)
            {{ $key }}
                <form method="post" name="play_input" action="{{ action('DetailsController@playMovie') }}">
                        @csrf<input type="hidden" name="link" value="{{ $value['url'] }}">
                    <input type="submit" name="play_submit" value="play"></form>
        @endforeach
    @endforeach
</section>
@endsection