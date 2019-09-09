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
                <a href="{{ route('usertweetlist', ['user'=> $profile->id ]) }}"> {{ $profile->user->tweets->count() }} <strong class="text-dark font-weight-bold small">Tweets </strong></a> |
                <a href="{{ route('userfollowers', ['user'=> $profile->id ]) }}"> {{ $profile->followers->count() }} <strong class="text-dark font-weight-bold small">Followers </strong></a> |
                <a href="{{ route('userfollowing', ['user'=> $profile->id ]) }}"> {{ $profile->user->following->count() }}  <strong class="text-dark font-weight-bold small">Following</strong></a>
            </p>
            <hr />
            @if(auth()->check() && auth()->user()->id !== $profile->user->id)
                <follow-button  user-id="{{ $profile->user->id }}"
                                follows="{{ isset($following) && in_array($profile->user->id, $following) ? true : false }}">
                </follow-button>
            @endif
        </div>
    </div>
</div>
