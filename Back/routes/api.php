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
Route::GET('listUser','UserController@listUser');

Route::PUT('updateUser/{id}','UserController@updateUser');

Route::DELETE('deleteUser/{id}','UserController@deleteUser');

//DormRoom
Route::POST('createDormRoom','DormRoomController@createDormRoom');

Route::GET('showDormRoom/{id}','DormRoomController@showDormRoom');
Route::GET('listDormRoom','DormRoomController@listDormRoom');

Route::PUT('updateDormRoom/{id}','DormRoomController@updateDormRoom');

Route::PUT('addUserToDormRoom/{User_id}/{DormRoom_id}','DormRoomController@addUser');
Route::PUT('removeUserFromDormRoom/{User_id}/{DormRoom_id}','DormRoomController@removeUser');

Route::DELETE('deleteDormRoom/{id}','DormRoomController@deleteDormRoom');

//Comment
Route::POST('createComment','CommentController@createComment');

Route::GET('showComment/{id}','CommentController@showComment');
Route::GET('listComment','CommentController@listComment');

Route::PUT('updateComment/{id}','CommentController@updateComment');

Route::PUT('addDormRoomToComment/{DormRoom_id}/{Comment_id}','CommentController@addDormRoom'); 
Route::PUT('removeDormRoomFromComment/{DormRoom_id}/{Comment_id}','CommentController@removeDormRoom');

Route::PUT('addUserToComment/{User_id}/{Comment_id}','CommentController@addUser');
Route::PUT('removeUserFromComment/{User_id}/{Comment_id}','CommentController@removeUser');

Route::DELETE('deleteComment/{id}','CommentController@deleteComment');