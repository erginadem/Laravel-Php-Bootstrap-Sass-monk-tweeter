@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="clm">
            <h3 class="text-primary"> Edit Profile </h3>
            <hr />
            <div class="card-body">
                <h4 class="text-info mb-3"> {{ $profile->user->name}} </h4>
                <form class="" action="/profiles/{{ $profile->id }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    Birthday | {{ $profile->birthday }}<input name="birthday" type="date" class="form-control" /><br />
                    Location <input name="location" type="text" class="form-control" placeholder="{{ $profile->location }}"/> <br />
                    Bio <textarea name="bio" class="form-control" placeholder="{{ $profile->bio }}"></textarea> <br />
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>

            </div>
        </div>
    </div>

    @include('layouts/footer')

@endsection
