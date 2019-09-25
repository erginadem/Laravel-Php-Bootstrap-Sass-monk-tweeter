<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
}
