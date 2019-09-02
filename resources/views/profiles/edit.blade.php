@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <h1 class="text-primary">Edit Profile</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary"> <i class="fa fa-user"></i> {{ $profile->user->name}} </h3>
                    </div>
                    <div class="card-body">
                        <form class="" action="/profiles/{{ $profile->id }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <h6 class="text-danger">Birthday | yyyy-dd-mm </h6>
                            <input name="birthday" placeholder="{{ $profile->birthday }}" class="form-control" /><br />
                            <h6 class="text-danger">Location</h6>
                            <input name="location" type="text" class="form-control" placeholder="{{ $profile->location }}"/> <br />
                            <h6 class="text-danger">Bio</h6>
                            <textarea name="bio" class="form-control" placeholder="{{ $profile->bio }}"></textarea> <br />
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
