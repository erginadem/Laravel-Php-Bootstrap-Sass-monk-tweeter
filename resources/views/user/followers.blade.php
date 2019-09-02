@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="col-md-8">
            <div class="">
                <h1 class='text text-primary'>Followers</h1>
                <hr />
            </div>
            <div class="col">
                @foreach($profiles as $profile)
                    @include('profiles._profile')
                @endforeach
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
