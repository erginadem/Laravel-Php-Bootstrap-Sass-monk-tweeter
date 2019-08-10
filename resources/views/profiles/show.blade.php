@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary"> {{ $user->name }} </h2> <br>
                <h6 class="card-text"> <img src="{{ asset('img/dob.png') }}" alt="dob"> {{ $user->profile->birthday }}</h6>
                <h6 class="card-text text-danger"><img src="{{ asset('img/location.png') }}" alt="location"> {{ $user->profile->location }}</h6>
                 <div class="card-text">
                     <h6 class="">{{ $user->profile->bio }}</h6>
                 </div>

                <div class="card-text">
                    <hr>
                    <h5 class="d-inline text-danger">{{ $user->tweets->count() }} </h5> Tweets |
                    <h5 class="d-inline text-danger">{{ $user->profile->followers->count() }} </h5> Followers |
                    <h5 class="d-inline text-danger">{{ $user->following->count() }} </h5> Following
                </div>

                <div class="card-text">
                    @if(auth()->check() && auth()->user()->id !== $user->id)
                        <follow-button  user-id="{{ $user->id }}" follows="{{ $user->follows }}"> <follow-button>
                    @endif
                </div>
            </div>
        </div>
        <br />
        @if(Auth::id() == $user->id)
            <a class="btn btn-primary btn-sm ml-2" href="/profiles/{{ $user->id }}/edit">Edit Profile</a>
        @endif

    </div>

    @include('layouts/footer')

@endsection
