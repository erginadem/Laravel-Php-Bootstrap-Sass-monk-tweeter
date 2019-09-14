<div class="">
    <h1>New Comment</h1>
    <p> {{ $comment->user->name }} has commented on your tweet! </p>
    <p>
        <a href="{{ env('APP_URL') . '/tweets/' . $comment->tweet->id }}">View Comments</a>
    </p>
</div>
