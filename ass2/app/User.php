<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'dob', 'password', 'image',  //allows single line filling
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    function post() {
        return $this->hasMany('App\Post');          //Establishes Users has many Posts relationship
    }
    function comment() {
        return $this->hasMany('App\Comment');       //Establishes Users has many comments relationship
    }
    
    function friend() {
        return $this->hasMany('App\Friend');          //Establishes Users has many Friends relationship
    }
}
