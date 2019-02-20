<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['usera', 'userb',]; //allows single line filling
     
    function user() {
        return $this->hasMany('App\User');          //Establishes Friend model has many users relationship
    }
}
