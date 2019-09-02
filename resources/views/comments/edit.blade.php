@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="col-md-8">
            <div class="">
                <h1 class="text text-primary"> Edit Comment </h1>
                <hr />
            </div>
            <div class="col">
                <form action="/comments/ {{ $comment->id }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                        <form class="table" action="/comments" method="POST">
                            @csrf
                            <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
                            <div class="mt-2 mb-2">
                                <img src="{{ $comment->gif}}" alt="">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-2">Save</button>
                            <giphy-search :value="this.gif"></giphy-search>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
