@extends('layouts.app')

@section('content')
    <div class="mt-5"> </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('tweets/_tweet')
        </div>
    </div>

    @include('layouts/footer')
@endsection
