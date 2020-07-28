<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use DormRoom;
use Illuminate\Http\Request;

class Comment extends Model
{

    //Create
    public function createComment(Request $request) {
        $this->content = $request->content;
        $this->isPositive = $request->isPositive;
        $this->save();
    }

    //Update
    public function updateComment(Request $request) {
        if($request->content) {
            $this->content = $request->content;
        }
        if($request->numberOfResidents) {
            $this->numberOfResidents = $request->numberOfResidents;
        }
        if($request->isPositive) {
            $this->isPositive = $request->isPositive;
        }
        $this->save();
    }


    //Relações
    public function user() {                     //autor
        return $this->belongsTo('App\User');
    }

    public function dormRoom() {                 //republica
        return $this->belongsTo('App\DormRoom');
    }
}
