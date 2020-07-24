<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DormRoom;
use App\User;

class DormRoomController extends Controller
{
    // Create
    public function createDormRoom(Request $request) {
        $DormRoom = new DormRoom;
        $DormRoom->address = $request->address;
        $DormRoom->numberOfRooms = $request->numberOfRooms;
        $DormRoom->numberOfBathrooms = $request->numberOfBathrooms;
        $DormRoom->numberOfResidents = $request->numberOfResidents;
        $DormRoom->size = $request->size;
        $DormRoom->price = $request->price;
        $DormRoom->allowsAnimals = $request->allowsAnimals;
        $DormRoom->save();
        return response()->json($DormRoom);
    }

    //Read
    public function showDormRoom($id) {
        $DormRoom = DormRoom::findOrFail($id);
        return response()->json($DormRoom);
    }

    public function listDormRoom(){
        $DormRoom = DormRoom::all();
        return response()->json([$DormRoom]);
    }

    //Update
    public function updateDormRoom(Request $request, $id) {
        $DormRoom = DormRoom::findOrFail($id);

        if($request->address) {
            $DormRoom->address = $request->address;
        }
        if($request->numberOfRooms) {
            $DormRoom->numberOfRooms = $request->numberOfRooms;
        }
        if($request->numberOfBathrooms) {
            $DormRoom->numberOfBathrooms = $request->numberOfBathrooms;
        }
        if($request->numberOfResidents) {
            $DormRoom->numberOfResidents = $request->numberOfResidents;
        }
        if($request->size) {
            $DormRoom->size = $request->size;
        }
        if($request->price) {
            $DormRoom->price = $request->price;
        }
        if($request->allowsAnimals) {
            $DormRoom->allowsAnimals = $request->allowsAnimals;
        }

        $DormRoom->save();
        return response()->json($DormRoom);
    }

    //Delete
    public function deleteDormRoom($id) {
        DormRoom::destroy($id);
        return response()->json(['Produto deletado']);
    }

    //Update relação
    public function addDormRoom($id, $DormRoom_id) {
        $user = User::findOrFail($id);
        $DormRoom = DormRoom::findOrFail($DormRoom_id);
        $DormRoom->User_id = $id;
        $DormRoom->save();
        return response()->json($DormRoom);
    }

    public function removeDormRoom($id, $DormRoom_id) {
        $user = User::findOrFail($id);
        $DormRoom = DormRoom::findOrFail($DormRoom_id);
        $DormRoom->User_id = null;
        $DormRoom->save();
        return response()->json($DormRoom);
    }
}
