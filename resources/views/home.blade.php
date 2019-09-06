@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <div class="card-body text-center">
                        <img src="{{ asset('img/success.png') }}" class="img-fluid" alt="success" />
                        <hr />
                        <h5>You have successfully registered and logged in.</h5>
                        <hr />
                        <a href="profiles" class="btn btn-primary"><i class="fa fa-arrow-right"> next </i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
