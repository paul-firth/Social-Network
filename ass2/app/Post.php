<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'title', 'message', 'num_com', 'user',]; //allows single line filling
    
        function comment() {
        return $this->hasMany('App\Comment');  //Establishes Post has many Comments relationship
    }
    
        function user() {
        return $this->belongsTo('App\User');    //Establishes post belongs to one user relationship
    }
}