<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use DormRoom;

class Comment extends Model
{
    public function User() {
        return $this->belongsTo('App\User');
    }

    public function DormRoom() {
        return $this->belongsTo('App\DormRoom');
    }
}
