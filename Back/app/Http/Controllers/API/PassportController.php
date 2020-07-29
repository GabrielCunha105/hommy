<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Auth;

class PassportController extends Controller
{
    public function register(UserRequest $request) {
        $newUser = new User;
        $newUser->createUser($request);
        $success['token']=$newUser->createToken('MyApp')->accessToken;
        return response()->json(['success'=> $success, 'user'=>$newUser], 200);
    }

    public function login() {
        if (Auth::attempt(['email'=>request('email'), 'password'=>request('password')])) {
            $user=Auth::user();
            $success['token']=$user->createToken('MyApp')->accessToken;
            return response()->json(['success'=>$success, 'user'=>$user], 200);
        }
        else {
            return response()->json(['error'=>'Unauthorized', 'status'=>401]);
        }
    }

    public function getDetails() {
        $user = Auth::user();
        return response()->json(['user'=>$user, 200]);
    }

    public function logout() {
        $accessToken = Auth::accessToken()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id',$accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json(['usuário deslogado'], 200);
    }
}