<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'message', 'post']; //allows isngle line fill
    
    function post() {
        return $this->belongsTo('App\Post');  //Establishes comment belongs to one post
    }
}
