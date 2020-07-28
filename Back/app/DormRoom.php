<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use Comment;

class DormRoom extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

}
