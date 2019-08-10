<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }

    public function following()
    {
        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        $profiles = \App\Profile::whereIn('id', $following)->paginate(10);

        return view('user/following', compact('profiles', 'following'));
    }

    public function followers()
    {
        $followers = auth()->user()->followers()->pluck('profile_user.profile_id')->toArray();

        $profiles = \App\Profile::whereIn('id', $followers)->paginate(10);

        return view('user/followers', compact('profiles', 'followers'));
    }
}
