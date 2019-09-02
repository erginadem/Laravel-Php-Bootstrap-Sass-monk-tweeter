@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-primary"> Comment </h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text text-info"> <i class="fa fa-user"></i> {{ $tweet->user->name}} </h3>
                        <p> {{ $tweet->body}} </p>

                        @foreach($tweet->comments as $comment)
                            @include('comments._comment')
                        @endforeach
                    </div>
                </div>
                <hr />
                <form action="/comments/{{$tweet->id}}" method="POST">
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
