@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="clm">
            <h3 class="text text-primary"> Edit Tweet </h3>
            <hr />
            <form class="" action="/tweets/{{ $tweet->id }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <textarea name="body" class="form-control">{{ $tweet->body }}</textarea>
                <br />
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </form>
        </div>
    </div>

    @include('layouts/footer')

@endsection
