<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = \App\Tweet::orderBy('created_at', 'desc')->paginate(20);

        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        //dd($tweets[0]->user->follows);

        return view('tweets/index', compact('tweets', 'following'));
    }

    public function list()
    {
        $tweets = \App\Tweet::latest()->get();
        return $tweets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets/create');
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
            'body' => 'required | min:5 | max:1000',
        ]);

        $tweet = new \App\Tweet;

        $tweet->body = $request->body;
        $tweet->user_id = \Auth::user()->id;

        if($tweet->save()) {
            return redirect('/tweets');
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
    public function show($id)
    {
        // Load single tweet from DB by it's ID
        $tweet = \App\Tweet::find($id);

        return view('tweets/show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);

        return view('tweets/edit', compact('tweet'));
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
        $tweet = \App\Tweet::find($id);

        $tweet->body = $request->body;


        if($tweet->save()) {
            return redirect('/tweets');
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
        $tweet = \App\Tweet::find($id)->delete();

        if($tweet){
            return redirect('/tweets');
        }
            return back();
    }

    public function like($id)
    {
        // check for existing Like
        $existing = \App\Like::where('user_id', Auth::id())
                                ->where('tweet_id', $id)
                                ->count();

        if($existing) {
            $delete = \App\Like::where('user_id', Auth::id())
                                    ->where('tweet_id', $id)
                                    ->delete();
            if($delete)
                return back();
        }

        // otherwise - add a new like
        $like = new \App\Like;
        $like->user_id = Auth::id();
        $like->tweet_id = $id;

        if($like->save()){
            return back();
        }
    }

    public function tweetlist()
    {
        $tweets = \App\Tweet::where('user_id', Auth::id())->paginate(10);

        // dd($tweet);

        return view('user/tweetlist', compact('tweets'));
    }
}
