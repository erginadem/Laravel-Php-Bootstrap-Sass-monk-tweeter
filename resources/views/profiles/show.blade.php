@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-primary">User Profile</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary"><i class="fa fa-user"></i> {{ $user->name }} </h3>
                    </div>
                    <div class="card-body">
                        <p> <i class="fa fa-birthday-cake"></i> {{ $user->profile->birthday }}</p>
                        <p> <i class="fa fa-location-arrow"></i> {{ $user->profile->location }}</p>
                        <p> <i class="fa fa-book"></i> {{ $user->profile->bio }} </p>
                        <hr />
                        <p>
                            {{ $user->tweets->count() }} <strong class="text text-secondary">Tweets</strong>  |
                            {{ $user->profile->followers->count() }} <strong class="text text-secondary">Followers</strong>  |
                            {{ $user->following->count() }}  <strong class="text text-secondary">Following</strong>
                        </p>
                        <hr />
                        @if(auth()->check() && auth()->user()->id !== $user->id)
                            <follow-button  user-id="{{ $user->id }}" follows="{{ $user->follows }}"> <follow-button>
                        @endif

                        @if(Auth::id() == $user->id)
                            <a class="btn btn-primary btn-sm" href="/profiles/{{ $user->id }}/edit"> <i class="fa fa-edit"></i> edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
