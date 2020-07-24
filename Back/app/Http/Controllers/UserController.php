<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //Create
    public function createUser(Request $request) {
        $User = new User;
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
}
