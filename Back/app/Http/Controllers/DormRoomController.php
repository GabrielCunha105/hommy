<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DormRoom;
use App\User;

class DormRoomController extends Controller
{
    // Create
    public function createDormRoom(Request $request) {
        $dormRoom = new DormRoom;
        $dormRoom->address = $request->address;
        $dormRoom->numberOfRooms = $request->numberOfRooms;
        $dormRoom->numberOfBathrooms = $request->numberOfBathrooms;
        $dormRoom->numberOfResidents = $request->numberOfResidents;
        $dormRoom->size = $request->size;
        $dormRoom->price = $request->price;
        $dormRoom->allowsAnimals = $request->allowsAnimals;
        $dormRoom->save();
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
    public function updateDormRoom(Request $request, $id) {
        $dormRoom = DormRoom::findOrFail($id);

        if($request->address) {
            $dormRoom->address = $request->address;
        }
        if($request->numberOfRooms) {
            $dormRoom->numberOfRooms = $request->numberOfRooms;
        }
        if($request->numberOfBathrooms) {
            $dormRoom->numberOfBathrooms = $request->numberOfBathrooms;
        }
        if($request->numberOfResidents) {
            $dormRoom->numberOfResidents = $request->numberOfResidents;
        }
        if($request->size) {
            $dormRoom->size = $request->size;
        }
        if($request->price) {
            $dormRoom->price = $request->price;
        }
        if($request->allowsAnimals) {
            $dormRoom->allowsAnimals = $request->allowsAnimals;
        }

        $dormRoom->save();
        return response()->json($dormRoom);
    }

    //Delete
    public function deleteDormRoom($id) {
        DormRoom::destroy($id);
        return response()->json(['Republica deletada']);
    }

    //Update relação c/ User
    public function addUser($user_id, $dormRoom_id) {
        $user = User::findOrFail($user_id);
        $dormRoom = DormRoom::findOrFail($dormRoom_id);
        $dormRoom->user_id = $user_id;
        $dormRoom->save();
        return response()->json($dormRoom);
    }

    public function removeUser($user_id, $dormRoom_id) {
        $user = User::findOrFail($user_id);
        $dormRoom = DormRoom::findOrFail($dormRoom_id);
        $dormRoom->user_id = null;
        $dormRoom->save();
        return response()->json($dormRoom);
    }
}
