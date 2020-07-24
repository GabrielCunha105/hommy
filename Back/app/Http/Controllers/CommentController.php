<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Create
    public function createComment(Request $request) {
        $Comment = new Comment;
        $Comment->postTime = $request->postTime;
        $Comment->editTime = $request->editTime;
        $Comment->content = $request->content;
        $Comment->isPositive = $request->isPositive;
        $Comment->save();
        return response()->json($Comment);
    }

    //Read
    public function showComment($id) {
        $Comment = Comment::findOrFail($id);
        return response()->json($Comment);
    }

    public function listComment(){
        $Comment = Comment::all();
        return response()->json([$Comment]);
    }

    //Update
    public function updateComment(Request $request, $id) {
        $Comment = Comment::findOrFail($id);

        if($request->postTime) {
            $Comment->postTime = $request->postTime;
        }
        if($request->editTime) {
            $Comment->editTime = $request->editTime;
        }
        if($request->content) {
            $Comment->content = $request->content;
        }
        if($request->numberOfResidents) {
            $Comment->numberOfResidents = $request->numberOfResidents;
        }
        if($request->isPositive) {
            $Comment->isPositive = $request->isPositive;
        }
        $Comment->save();
        return response()->json($Comment);
    }

    //Delete
    public function deleteComment($id) {
        Comment::destroy($id);
        return response()->json(['Produto deletado']);
    }

    //Update relação c/ DormRoom
    public function addDormRoom($DormRoom_id, $Comment_id) {
        $DormRoom = DormRoom::findOrFail($DormRoom_id);
        $Comment = Commennt::findOrFail($id);
        $Comment->dorm_room_id = $DormRoom_id;
        $DormRoom->save();
        return response()->json($Comment);
    }

    public function removeDormRoom($DormRoom_id, $Comment_id) {
        $DormRoom = DormRoom::findOrFail($DormRoom_id);
        $Comment = Comment::findOrFail($Comment_id);
        $Comment->dorm_room_id = null;
        $DormRoom->save();
        return response()->json($Comment);
    }

    //Update relação c/ User
    public function addUser($id, $Comment_id) {
        $user = User::findOrFail($id);
        $Comment = Comment::findOrFail($Comment_id);
        $Comment->user_id = $id;
        $Comment->save();
        return response()->json($Comment);
    }

    public function removeUser($id, $Comment_id) {
        $user = User::findOrFail($id);
        $Comment = Comment::findOrFail($Comment_id);
        $Comment->user_id = null;
        $Comment->save();
        return response()->json($Comment);
    }
}
