@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(Auth::id() == $profile->user->id)
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
                            <textarea name="birthday" class="form-control text text-secondary">{{ $profile->birthday }}</textarea>
                            <br />
                            <h6 class="text-danger">Location</h6>
                            <textarea name="location" class="form-control text text-secondary">{{ $profile->location }}</textarea>
                            <br />
                            <h6 class="text-danger">Bio</h6>
                            <textarea name="bio" class="form-control text text-secondary">{{ $profile->bio }}</textarea>
                            <br />
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> save </i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="col alert alert-danger">
                There is something wrong!
            </div>
        @endif
    </div>
    @include('layouts/footer')
@endsection
