<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="text-primary"> {{ $profile->user->name }} </h2> <br>
            <h6 class="card-text"> <img src="{{ asset('img/dob.png') }}" alt="dob"> {{ $profile->birthday }}</h6>
            <h6 class="card-text text-danger"><img src="{{ asset('img/location.png') }}" alt="location"> {{ $profile->location }}</h6>
             <div class="card-text">
                 <h6 class="">{{ $profile->bio }}</h6>
             </div>

            <div class="card-text">
                <hr>
                <h5 class="d-inline text-danger">{{ $profile->user->tweets->count() }} </h5> Tweets |
                <h5 class="d-inline text-danger">{{ $profile->followers->count() }} </h5> Followers |
                <h5 class="d-inline text-danger">{{ $profile->user->following->count() }} </h5> Following
            </div>
            <div class="card-text">
                @if(auth()->check() && auth()->user()->id !== $profile->user->id)
                    <follow-button  user-id="{{ $profile->user->id }}" follows="{{ $profile->user->following and in_array($profile->user->id, $profile->user->following->pluck('id')->toArray()) ? true : false }}"> <follow-button>
                @endif
            </div>
        </div>
    </div>
</div>
<br />
