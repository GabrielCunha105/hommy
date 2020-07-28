<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DormRoom;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    //Create
    public function createUser(UserRequest $request) {
        $user = new User;
        $user->createUser($request);
        return response()->json($user);
    }

    //Update
    public function updateUser(UserRequest $request, $id) {
        $user = User::findOrFail($id);
        $user->updateUser($request);
        $user->save();
        return response()->json($user);
    }

    //Read
    public function showUser($id) {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function listUser(){
        $user = User::all();
        return response()->json([$user]);
    }

    public function showResidenceOf($id) {
        $user = User::findOrFail($id);
        $residence = $user->showResidenceOf();
        return response()->json($residence);
    } 

    //Delete
    public function deleteUser($id) {
        User::destroy($id);
        return response()->json(['Usuario deletado']);
    }

    //Update relação c/ favoritos
    public function favoritar($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $user->favoritas()->attach($dorm_room_id);
        return response()->json($user);
    }

    public function desfavoritar($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $user->favoritas()->detach($dorm_room_id);
        return response()->json($user);
    }

    //Update relação c/ aluguel
    public function alugar($user_id, $dorm_room_id) {
        $user = User::findOrFail($user_id);
        $user->alugar($dorm_room_id);
        return response()->json($user);
    }

    public function terminarAluguel($user_id) {
        $user = User::findOrFail($user_id);
        $user->Terminaraluguel();
        return response()->json($user);
    }
}
