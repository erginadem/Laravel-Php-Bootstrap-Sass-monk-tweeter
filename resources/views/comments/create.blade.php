@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class="text-primary"> Comment </h1>
        <hr />
        <div class="card">
            <div class="card-body">
                <h3 class="text text-info"> {{ $tweet->user->name}} </h3>
                <p> {{ $tweet->body}} </p>
            </div>
        </div>
        <hr />
        <form action="/comments/{{$tweet->id}}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm" href="/tweets/{{ $tweet->id }}">Save</button>
            </div>
        </form>
    </div>

    @include('layouts/footer')

@endsection
