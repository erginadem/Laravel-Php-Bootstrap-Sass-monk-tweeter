<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="text text-info d-inline">{{ $comment->user->name }}   </h6>
                <p class="d-inline"> | {{ $comment->created_at->diffForhumans() }}</p>
                <br />
                {{ $comment->body }}
                <br />

                @if(Auth::id() == $comment->user_id)
                    <a href="/comments/{{ $comment->id }}/edit" class="btn badge badge-warning">Edit</a>
                    <form class="d-inline" action="/comments/{{ $comment->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="badge badge-danger">Delete</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
