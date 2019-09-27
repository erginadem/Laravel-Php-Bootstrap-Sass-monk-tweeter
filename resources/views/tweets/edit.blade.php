@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(Auth::id() == $tweet->user->id)
        <h1 class="text text-light text-center mb-3"> Edit Tweet </h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="" action="/tweets/{{ $tweet->id }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <textarea name="body" class="form-control">{{ $tweet->body }}</textarea>
                    <br />
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> save</button>
                </form>
            </div>
        </div>
    @else
        <div class="col alert alert-danger">
            There is something wrong!
        </div>
    @endif
    </div>
    @include('layouts/footer')
@endsection
