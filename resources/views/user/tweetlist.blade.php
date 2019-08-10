@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="col-">
            <h1 class="text-primary">My Tweets</h1>
            <hr />
        </div>

        @foreach($tweets as $tweet)
            @include('tweets._tweet')

            @foreach($tweet->comments as $comment)
                @include('comments._comment')
                <br />
            @endforeach

        @endforeach
    </div>

    @include('layouts/footer')

@endsection
