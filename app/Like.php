<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // protected fillable
    
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
