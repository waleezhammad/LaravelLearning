<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
}
