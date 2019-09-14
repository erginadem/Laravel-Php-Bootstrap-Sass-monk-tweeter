@extends('layouts.app')
<div class="mt-5"></div>

@section('content')
    @include('tweets/_tweet')

    <form action="/tweets/ {{ $tweet->id }}" method="POST">
    </form>

    @include('layouts/footer')
@endsection
