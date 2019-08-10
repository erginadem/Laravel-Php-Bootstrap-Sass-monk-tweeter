<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="/tweets/{{ $tweet->id }}"> {{ $tweet->user->name }} </a>
                @if(auth()->check() && auth()->user()->id !== $tweet->user->id)|
                    <follow-button class="d-inline" user-id="{{ $tweet->user->id }}" follows="{{ in_array($tweet->user->id, $following) ? true : false }}"> <follow-button>
                @endif
            </h4>
            {{ $tweet->body }}
            <hr />

            <a href="/comments/create/{{ $tweet->id }}" class="btn btn-dark btn-sm">Comment ({{ $tweet->comments()->count() }})</a>
            <a href="/tweets/{{ $tweet->id }}/like" class="btn btn-success btn-sm">Like ({{ $tweet->likes()->count() }})</a>

            @if(Auth::id() == $tweet->user_id)
                <a class="btn btn-primary btn-sm" href="/tweets/{{ $tweet->id }}/edit">Edit</a>

                <form class="d-inline" action="/tweets/ {{ $tweet->id }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm" name="button">
                        Delete
                    </button>
                </form>
            @endif

        </div>
    </div>
    <br>
</div>
