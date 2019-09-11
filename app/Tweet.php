<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Tweet extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getLikedByUserAttribute()
    {
        $id = Auth::id();
        $like = $this->likes->first(function ($row) use ($id) {
            return $row->user_id === $id;
        });

        if ($like) return true;
        return false;

    }
}
