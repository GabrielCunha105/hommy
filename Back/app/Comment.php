<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use DormRoom;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function dormRoom() {
        return $this->belongsTo('App\DormRoom');
    }
}
