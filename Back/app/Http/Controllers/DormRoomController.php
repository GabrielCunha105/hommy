<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DormRoom;
use App\User;

class DormRoomController extends Controller
{
    public function createDormRoom(Request $request) {
        $DormRoom = new DormRoom;
        $DormRoom->address = $request->address;
        $DormRoom->numberOfRooms = $request->numberOfRooms;
        $DormRoom->numberOfBathrooms = $request->numberOfBathrooms;
        $DormRoom->numberOfResidents = $request->numberOfResidents;
        $DormRoom->save();
        return response()->json($DormRoom);
    }


    public function showDormRoom($id) {
        $DormRoom = DormRoom::findOrFail($id);
        return response()->json($DormRoom);
    }

    public function listDormRoom(){
        $DormRoom = DormRoom::all();
        return response()->json([$DormRoom]);
    }

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

        $DormRoom->save();
        return response()->json($DormRoom);
    }


    public function deleteDormRoom($id) {
        DormRoom::destroy($id);
        return response()->json(['Produto deletado']);
    }

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
