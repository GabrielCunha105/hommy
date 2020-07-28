<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use DormRoom;

class Comment extends Model
{

    // Create
    public function createComment(Request $request) {
        $this->content = $request->content;
        $this->isPositive = $request->isPositive;
        $this->save();
    }

    //Update
    public function updateComment(Request $request, $id) {
        if($request->content) {
            $comment->content = $request->content;
        }
        if($request->numberOfResidents) {
            $comment->numberOfResidents = $request->numberOfResidents;
        }
        if($request->isPositive) {
            $comment->isPositive = $request->isPositive;
        }
        $comment->save();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function dormRoom() {
        return $this->belongsTo('App\DormRoom');
    }
}
