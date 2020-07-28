<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\DormRoom;

class CommentController extends Controller
{
    // Create
    public function createComment(Request $request) {
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->isPositive = $request->isPositive;
        $comment->save();
        return response()->json($comment);
    }

    //Read
    public function showComment($id) {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    public function listComment(){
        $comment = Comment::all();
        return response()->json([$comment]);
    }

    //Update
    public function updateComment(Request $request, $id) {
        $comment = Comment::findOrFail($id);

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
        return response()->json($comment);
    }

    //Delete
    public function deleteComment($id) {
        Comment::destroy($id);
        return response()->json(['Comentario deletado']);
    }

    //Update relação c/ DormRoom
    public function addDormRoom($dorm_room_id, $comment_id) {
        $DormRoom = DormRoom::findOrFail($dorm_room_id);
        $comment = Comment::findOrFail($comment_id);
        $comment->dorm_room_id = $dorm_room_id;
        $comment->save();
        return response()->json($comment);
    }

    public function removeDormRoom($dorm_room_id, $comment_id) {
        $DormRoom = DormRoom::findOrFail($dorm_room_id);
        $comment = Comment::findOrFail($comment_id);
        $comment->dorm_room_id = null;
        $comment->save();
        return response()->json($comment);
    }

    //Update relação c/ User
    public function addUser($user_id, $comment_id) {
        $user = User::findOrFail($user_id);
        $comment = Comment::findOrFail($comment_id);
        $comment->user_id = $user_id;
        $comment->save();
        return response()->json($comment);
    }

    public function removeUser($user_id, $comment_id) {
        $user = User::findOrFail($user_id);
        $comment = Comment::findOrFail($comment_id);
        $comment->user_id = null;
        $comment->save();
        return response()->json($comment);
    }
}
