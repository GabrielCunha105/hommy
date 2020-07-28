<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    //Create
    public function createUser(UserRequest $request) {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->gender = $request->gender;
        $user->isTenant = $request->isTenant;
        $user->registrationDate = $request->registrationDate;
        $user->password = $request->password;
        if($request->college && $request->isTenant) {
            $user->college = $request->college;
        }
        $user->save();
        return response()->json($user);
    }

    //Update
    public function updateUser(UserRequest $request, $id) {
        $user = User::findOrFail($id);

        if($request->name) {
            $user->name = $request->name;
        }
        if($request->email) {
            $user->email = $request->email;
        }
        if($request->dateOfBirth) {
            $user->dateOfBirth = $request->dateOfBirth;
        }
        if($request->gender) {
            $user->gender = $request->gender;
        }
        if($request->isTenant) {
            $user->isTenant = $request->isTenant;
        }
        if($request->registrationDate) {
            $user->registrationDate = $request->registrationDate;
        }
        if($request->password) {
            $user->password = $request->password;
        }
        if($request->college && $user->isTenant) {
            $user->college = $request->college;
        }

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

    //Delete
    public function deleteUser($id) {
        User::destroy($id);
        return response()->json(['Usuario deletado']);
    }
}
