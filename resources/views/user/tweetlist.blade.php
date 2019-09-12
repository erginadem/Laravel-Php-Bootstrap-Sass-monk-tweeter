@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-primary">Tweets List</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($tweets as $tweet)
                    @include('tweets._tweet')
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">{{ $tweets->links() }} </div>
    @include('layouts/footer')
@endsection
