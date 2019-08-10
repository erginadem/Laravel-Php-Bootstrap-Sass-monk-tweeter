@extends('layouts.app')

@section('content')

    @include('tweets/_tweet')

    <form action="/tweets/ {{ $tweet->id }}" method="POST">
    </form>

    @foreach($tweet->comments as $comment)
        @include('comments._comment') <br />
    @endforeach
    
    @include('layouts/footer')

@endsection
