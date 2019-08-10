@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="clm">
            <h3 class="text text-primary"> Edit Reply </h3>
            <hr />
            <form action="/comments/ {{ $comment->id }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <form class="table" action="/comments" method="POST">
                        @csrf
                        <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
                        <br />
                        <button type="submit" class="btn btn-primary btn-sm">Save Reply</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    @include('layouts/footer')

@endsection
