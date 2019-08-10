@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body text-center">
                    <img src="{{ asset('img/success.png') }}" class="img-fluid" alt="success" />
                    <div class="card-body">
                        <h5 class="text-center text-dark">You have successfully registered and logged in.</h5>
                        <hr>
                        <a href="profiles"><button class="btn btn-dark" type="button" name="button">Next</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')

@endsection
