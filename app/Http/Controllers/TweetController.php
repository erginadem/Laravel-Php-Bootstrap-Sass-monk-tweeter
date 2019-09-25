<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tweet;
use App\Like;
use Storage;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tweets = \App\Tweet::orderBy('created_at', 'desc')->get();

        $tweets = \App\Tweet::latest()->paginate(20);
        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        //dd($tweets[0]->user->follows);

        return view('tweets.index', compact('tweets', 'following'));
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
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        request()->validate([
            'body'  => 'required|min:5|max:1000',
            'image' => 'required|nullable|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        // create tweet
        $tweet = new \App\Tweet;
        $tweet->body = $request->body;
        $tweet->user_id = \Auth::user()->id;
        $tweet->save();


        // upload to s3
        $tweet->image = Storage::disk('s3')->put('uploads/tweets/' . $tweet->id, request()->image, 'public');

        $tweet->save();

        return redirect($tweet->path());
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
        $following = $tweet->user->following->pluck('id')->toArray();

        return view('tweets.show', compact('tweet', 'following'));
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

        return view('tweets.edit', compact('tweet'));
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

    public function tweetlist($id = 0)
    {
        $tweets = \App\Tweet::where('user_id', $id ? $id : Auth::id())->paginate(10);

        return view('user.tweetlist', compact('tweets'));
    }

    public function marketing()
    {
        return view('marketing.index');
    }

    public function like($id)
    {
        $like = new \App\like;
        $like->user_id = Auth::id();
        $like->tweet_id = $id;

        if ($like->save()) {
            return json_encode([
                'status' => 'success'
            ]);

        }
            return json_encode([
                'status' => 'failed'
            ]);
    }

    public function unLike($id)
    {
        $like = \App\Like::where('tweet_id' , $id)
                                ->where('user_id', Auth::id())
                                ->first();

        if ($like->delete()) {
            return json_encode([
                'status' => 'success'
            ]);
        }
    }
}
