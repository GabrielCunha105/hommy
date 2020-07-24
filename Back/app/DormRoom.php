<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use Comment;

class DormRoom extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Comments() {
        return $this->hasMany('App\Comment');
    }

}
