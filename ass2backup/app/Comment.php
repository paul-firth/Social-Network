<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'message', 'post'];
    
    function post() {
        return $this->belongsTo('App\Post');
    }
}
