@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class='text text-primary'>New Tweet</h1>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-8 form-group">
                <form action="/tweets" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea name="body" placeholder="What's happening?" class="form-control mb-3"></textarea>
                    <label for="image">Add image: </label>
                    <input type="file" name="image" id="image" class="form-control-file mb-3" />
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-twitter"></i> Tweet</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
