@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-light text-center mb-3"> Comment </h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline text text-info"> <i class="fa fa-user"></i> {{ $tweet->user->name}} </h3>
                        <p class="d-inline text text-secondary small float-right"> {{ $tweet->created_at->diffForhumans() }} </p>
                        <p class="mt-2 ml-3"> {{ $tweet->body}} </p>
                        @foreach($tweet->comments as $comment)
                            @include('comments._comment')
                        @endforeach
                    </div>
                </div>
                <form class="ml-5 mt-3" action="/comments/{{$tweet->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" placeholder="write your comment here!" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-2" href="/tweets/{{ $tweet->id }}"> <i class="fa fa-save"></i> save</button>
                    <giphy-search :value="this.gif"></giphy-search>
                </form>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
