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
                            <div class="form-group">
                                <label for="birthday" class="col-md-6 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <p class="text-danger d-inline">Birthday | </p>
                                    <p class="text-secondary d-inline small">{{ $profile->birthday }}</p>
                                    <input id="birthday" type="date" class="mt-2 form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('name') }}" required autocomplete="birthday" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-md-6 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <p class="text-danger d-inline">Location | </p>
                                    <p class="text-secondary d-inline small">{{ $profile->location }}</p>
                                    <input id="location" type="text" class="mt-2 form-control @error('location') is-invalid @enderror" name="location" value="{{ old('name') }}" required autocomplete="location" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bio" class="col-md-8 col-form-label text-md-right"></label>
                                <div class="col-md-8">
                                    <p class="text-danger d-inline">Bio | </p>
                                    <p class="text-secondary d-inline small">{{ $profile->bio }}</p>
                                    <textarea id="bio" type="text" class="mt-2 form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('name') }}" required autocomplete="bio" autofocus></textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> save </i> </button>
                            </div>
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
