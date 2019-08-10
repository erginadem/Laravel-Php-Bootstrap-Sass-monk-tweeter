@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class='text text-primary'>New Tweet</h1>
        <hr />
        <form action="/tweets" method="POST">
            @csrf
            <textarea name="body" placeholder="What's happening?" class="form-control"></textarea>
            <br />
            <button type="submit" class="btn btn-primary btn-sm">Tweet</button>
        </form>
    </div>

    @include('layouts/footer')

@endsection
