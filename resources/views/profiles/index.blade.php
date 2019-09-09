@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class='text text-primary'>Tweeter Users</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($profiles as $profile)
                    @if(auth()->check() && auth()->user()->id !== $profile->user->id)
                        @include('profiles._profile')
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">{{ $profiles->links() }}    </div>
    @include('layouts/footer')
@endsection
