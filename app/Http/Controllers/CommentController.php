<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tweet;
use App\User;
use Auth;
use Mail;
use App\Mail\NewComment;

class CommentController extends Controller
{
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($tweet_id)
    {
        $tweet = \App\Tweet::find($tweet_id);

        return view('comments/create', compact('tweet_id', 'tweet'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $tweet_id)
    {
        $data = $request->all();
        $data = $request->validate([
            'body' => 'required|max:400',
        ]);

        $comment = new \App\Comment;
        $comment->body = $request->body;
        $comment->gif = $request->gif;
        $comment->tweet_id = $tweet_id;
        $comment->user_id = Auth::id();

        if ($comment->save()) {
            Mail::to($comment->user)->send(new NewComment($comment));
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
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $comment = \App\Comment::find($id);

        return view('comments/edit', compact('comment'));
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
        $comment = \App\Comment::find($id);
        $comment->body = $request->body;
        $comment->gif = $request->gif;

        if ($comment->save()) {
            return redirect('tweets');
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
        $delete = \App\Comment::destroy($id);

        if ($delete) {
            return redirect('tweets');
        }
        return back();
    }
}
