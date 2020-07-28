<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DormRoom;
use App\User;
use App\Http\Requests\DormRoomRequest;

class DormRoomController extends Controller
{
    // Create
    public function createDormRoom(DormRoomRequest $request) {
        $dormRoom = new DormRoom;
        $user->createDormRoom($request);
        return response()->json($dormRoom);
    }

    //Read
    public function showDormRoom($id) {
        $dormRoom = DormRoom::findOrFail($id);
        return response()->json($dormRoom);
    }

    public function listDormRoom(){
        $dormRoom = DormRoom::all();
        return response()->json([$dormRoom]);
    }

    //Update
    public function updateDormRoom(DormRoomRequest $request, $id) {
        $dormRoom = DormRoom::findOrFail($id);
        $dormRoom->updateDormRoom($request);
        return response()->json($dormRoom);
    }

    //Delete
    public function deleteDormRoom($id) {
        DormRoom::destroy($id);
        return response()->json(['Republica deletada']);
    }

    //Update relação c/ User
    public function addUser($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $dormRoom = DormRoom::findOrFail($dorm_room_id);
        if(!$user->isTenant) {
            $dormRoom->user_id = $user_id;
        }
        $dormRoom->save();
        return response()->json($dormRoom);
    }

    public function removeUser($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $dormRoom = DormRoom::findOrFail($dorm_room_id);
        $dormRoom->user_id = null;
        $dormRoom->save();
        return response()->json($dormRoom);
    }
}
