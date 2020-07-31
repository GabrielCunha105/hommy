<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DormRoom;
use App\User;
use App\Http\Requests\DormRoomRequest;
use App\Http\Resources\DormRooms;

class DormRoomController extends Controller
{
    // Create
    public function createDormRoom(DormRoomRequest $request) {
        $dormRoom = new DormRoom;
        $dormRoom->createDormRoom($request);
        return response()->json($dormRoom);
    }

    //Read
    public function showDormRoom($id) {
        $dormRoom = DormRoom::findOrFail($id);
        return response()->json(new DormRooms($dormRoom));
    }

    public function listDormRoom(){
        $dormRoom = DormRoom::all()->paginate(10);
        return response()->json(DormRooms::collection($dormRoom));
    }

    public function locatario($id) {
        $dormRoom = dormRoom::findOrFail($id);
        $locatarios = $dormRoom->locatario();
        return response()->json($locatarios);
    }

    public function proprietario($id) {
        $dormRoom = dormRoom::findOrFail($id);
        $proprietario = $dormRoom->proprietario();
        return response()->json($proprietario);
    }

    public function comentarios($id) {
        $dormRoom = dormRoom::findOrFail($id);
        $comentarios = $dormRoom->comentarios();
        return response()->json($comentarios);
    }

    public function searchDormRooms(Request $request) {
        $dormRoomList = DormRoom::where('id','>=',1);
        if ($request->price) {
            $dormRoomList = $dormRoomList->where('price','<=', $request->price);
        }
        if ($request->size) {
            $dormRoomList = $dormRoomList->where('size','>=', $request->size);
        }
        return DormRooms::collection($dormRoomList->paginate(10));
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

    //Update relação c/ User (proprietario)
    public function addUser($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $dormRoom = DormRoom::findOrFail($dorm_room_id);
        $dormRoom->user_id = $user_id;
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
