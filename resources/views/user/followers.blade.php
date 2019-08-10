@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class='text text-primary'>Followers</h1>
        <hr />
        
        @foreach($profiles as $profile)
            @include('profiles._profile')
        @endforeach

    </div>

    @include('layouts/footer')

@endsection
