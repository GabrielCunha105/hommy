<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //Create
    public function createUser(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dateOfBirth = $request->dateOfBirth;
        $user->gender = $request->gender;
        $user->isTenant = $request->isTenant;
        $user->registrationDate = $request->registrationDate;
        $user->password = $request->password;
        if($request->college) {
            $user->college = $request->college;
        }
        $user->save();
        return response()->json($user);
    }

    //Update
    public function updateUser(Request $request, $id) {
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
        if($request->college) {
            $user->college = $request->college;
        }

        $user->save();
        return response()->json($user);
    }

    //Read
    public function showUser($id) {
        $User = User::findOrFail($id);
        return response()->json($User);
    }

    public function listUser(){
        $User = User::all();
        return response()->json([$User]);
    }

    //Delete
    public function deleteUser($id) {
        User::destroy($id);
        return response()->json(['Produto deletado']);
    }
}
