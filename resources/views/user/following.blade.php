@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class='text text-primary'>Following List</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col">
                    @foreach($profiles as $profile)
                        @include('profiles._profile')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">{{ $profiles->links() }} </div>
    @include('layouts/footer')
@endsection
