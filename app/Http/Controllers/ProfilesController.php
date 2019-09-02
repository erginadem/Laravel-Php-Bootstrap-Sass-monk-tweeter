<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        $profiles = \App\Profile::orderby('created_at', 'desc')->paginate(20);

        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        return view('profiles/index', compact('profiles', 'user', 'following'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'birthday' => 'required',
            'location' => 'required',
            'bio' => 'required | min:5 | max:1000'
        ]);

        $profile = new \App\Profile;

        $profile->birthday = $request->birthday;
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->user_id = \Auth::user()->id;

        if($profile->save()) {
            return redirect('/profiles');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        // dd($user);

        $user = User::findOrFail($user);

        $profile = \App\Profile::find($user);

        return view('profiles/show', compact('profile', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $profile = \App\Profile::where('user_id', $id)->first();


        return view('profiles/edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = \App\Profile::find($id);

        $profile->birthday = $request->birthday;
        $profile->location = $request->location;
        $profile->bio = $request->bio;


        if($profile->save()) {
            return redirect('/profiles/'.$id);
        }
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = \App\Profile::find($id)->delete();

        if($profile){
            return redirect('/profiles');
        }
            return back();
    }
}
