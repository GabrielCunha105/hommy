<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::POST('createUser','UserController@createUser');

Route::GET('showUser/{id}','UserController@showUser');
Route::GET('ListUser','UserController@listUser');

Route::PUT('updateUser/{id}','UserController@updateUser');

Route::DELETE('deleteUser/{id}','UserController@deleteUser');

//DormRoom
Route::POST('createDormRoom','DormRoomController@createDormRoom');

Route::GET('showDormRoom/{id}','DormRoomController@showDormRoom');
Route::GET('listDormRoom','DormRoomController@listDormRoom');

Route::PUT('updateDormRoom/{id}','DormRoomController@updateDormRoom');
Route::PUT('addDormRoom/{id}/{id_DormRoom}','DormRoomController@addDormRoom');
Route::PUT('removeDormRoom/{id}/{id_DormRoom}','DormRoomController@removeDormRoom');

Route::DELETE('deleteDormRoom/{id}','DormRoomController@deleteDormRoom');