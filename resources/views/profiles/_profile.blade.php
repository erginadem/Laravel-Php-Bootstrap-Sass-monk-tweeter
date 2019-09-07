<div class="mb-3">
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary"> <i class="fa fa-user"></i> {{ $profile->user->name }} </h3>
        </div>
        <div class="card-body">
            <p> <i class="fa fa-birthday-cake"></i> {{ $profile->birthday }}</p>
            <p> <i class="fa fa-location-arrow"></i> {{ $profile->location }}</p>
            <p> <i class="fa fa-book"></i> {{ $profile->bio }} </p>
            <hr />
            <p>
                {{ $profile->user->tweets->count() }} <strong class="text text-secondary">Tweets</strong>  |
                {{ $profile->followers->count() }} <strong class="text text-secondary">Followers</strong>  |
                {{ $profile->user->following->count() }}  <strong class="text text-secondary">Following</strong>
            </p>
            <hr />
            @if(auth()->check() && auth()->user()->id !== $profile->user->id)
                <follow-button  user-id="{{ $profile->user->id }}"
                                follows="{{ in_array($profile->user->id, $following) ? true : false }}">
                </follow-button>
            @endif
        </div>
    </div>
</div>
