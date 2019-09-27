@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="col align-text-center">
            <h1 class='text text-light mb-3 text-center'>Home</h1>
        </div>
        <div class="col-">
            @foreach($tweets as $tweet)
                @include('tweets._tweet')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">{{ $tweets->links() }} </div>
    @include('layouts.footer')
@endsection
