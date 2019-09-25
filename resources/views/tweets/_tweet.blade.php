<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a href="/profiles/{{ $tweet->user->id }}">
                    <h4 class="d-inline"><i class="fa fa-user"></i> {{ $tweet->user->name }} </h4>
                </a>
                <p class="d-inline text text-secondary small"> {{ $tweet->created_at->diffForhumans() }} </p>

                <div class="col-md-8">
                    <a href="/storage/tweet_image/{{ $tweet->image }}">
                        <img src="{{ Storage::disk('s3')->url($tweet->image)}}" width="300px" alt="photo" />
                    </a>
                </div>

                <p class="mt-2 ml-2"> {{ $tweet->body }} </p>
                <div class="mb-3">
                    <a href="/comments/create/{{ $tweet->id }}" class="badge badge-warning"><i class="fa fa-comment"> comment </i> ({{ $tweet->comments()->count() }})</a>
                    <like-button class="d-inline" tweet-id="{{ $tweet->id}}" is-liked="{{ $tweet->likedByUser}}" :count="{{ $tweet->likes()->count()}}"></like-button>
                    @if(auth()->id() == $tweet->user_id)
                        <a class="badge badge-dark" href="/tweets/{{ $tweet->id }}/edit"><i class="fa fa-edit"> edit </i> </a>
                        <form class="d-inline" action="/tweets/ {{ $tweet->id }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" name="button"><i class="fa fa-trash"> delete </i> </button>
                        </form>
                    @endif
                </div>
                @foreach($tweet->comments as $comment)
                    @include('comments._comment')
                @endforeach
            </div>
        </div>
        <br>
    </div>
</div>
