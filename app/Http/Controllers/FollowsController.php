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

    public function following($id = 0)
    {
        $user = \App\User::where('id', $id ? $id : auth()->user()->id)->get();
        $following = $user[0]->following()->pluck('profile_user.profile_id')->toArray();
        $profiles = \App\Profile::whereIn('id', $following)->paginate(5);

        return view('user/following', compact('profiles', 'following'));
    }

    public function followers($id = 0)
    {
        $profile = \App\Profile::where('id', $id ? $id : auth()->user()->id)->get();
        $followers = $profile[0]->followers()->pluck('profile_user.user_id')->toArray();
        $profiles = \App\Profile::whereIn('id', $followers)->paginate(5);
        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        return view('user/followers', compact('profiles', 'followers', 'following'));
    }
}
