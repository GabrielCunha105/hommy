<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class DormRoom extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }
  
}
