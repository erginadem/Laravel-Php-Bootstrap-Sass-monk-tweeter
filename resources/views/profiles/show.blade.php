@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-light text-center mb-3">User Profile</h1>
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
                            <a href="{{ route('usertweetlist', ['user'=> $user->id ]) }}">{{ $user->tweets->count() }} <strong class="text-dark font-weight-bold small">Tweets</strong></a>  |
                            <a href="{{ route('userfollowers', ['user'=> $user->id ]) }}">{{ $user->profile->followers->count() }} <strong class="text-dark font-weight-bold small">Followers</strong></a>  |
                            <a href="{{ route('userfollowing', ['user'=> $user->id ]) }}">{{ $user->following->count() }}  <strong class="text-dark font-weight-bold small">Following</strong> </a>
                        </p>
                        <hr />
                        @if(auth()->check() && auth()->user()->id !== $user->id)
                            <follow-button  user-id="{{ $user->id }}" follows="{{ in_array($user->id, $following) ? true : false }}"> </follow-button>
                        @endif

                        @if(Auth::id() == $user->id)
                            <a class="btn btn-primary btn-sm" href="/profiles/{{ $user->id }}/edit"> <i class="fa fa-edit"> edit </i> </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
