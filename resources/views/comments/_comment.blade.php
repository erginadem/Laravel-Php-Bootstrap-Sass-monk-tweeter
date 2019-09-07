<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <a href="/profiles/{{ $comment->user->id }}">
            <h6 class="text text-info d-inline"><i class="fa fa-user"></i> {{ $comment->user->name }} </h6>
            </a>
            <p class="d-inline"> | {{ $comment->created_at->diffForhumans() }}</p>
            <br />
            {{ $comment->body }}
            <div class="col mt-3 mb-3">
                @if ($comment->gif)
                <img class="img-fluid border border-secondary" src="{{ $comment->gif }}" />
                @endif
            </div>
            <div class="mt-1 float-right">
                @if(Auth::id() == $comment->user_id)
                    <a href="/comments/{{ $comment->id }}/edit" class="badge badge-dark">  <i class="fa fa-edit"> edit</i></a>
                    <form class="d-inline" action="/comments/{{ $comment->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="badge badge-danger"><i class="fa fa-trash"> delete </i> </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
