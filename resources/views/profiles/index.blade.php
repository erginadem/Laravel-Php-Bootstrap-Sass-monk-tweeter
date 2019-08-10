@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class='text text-primary'>Who to follow</h1>
        <hr />

        @foreach($profiles as $profile)
            @if(auth()->check() && auth()->user()->id !== $profile->user->id)
                @include('profiles._profile')
            @endif

        @endforeach

        <div class="mb-5">
            <a href="tweets"><button class="ml-3 btn btn-dark btn-sm" type="button" name="button">Home</button></a>
        </div>
    </div>

    @include('layouts/footer')

@endsection
