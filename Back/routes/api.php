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
Route::GET('showResidenceOf/{id}','UserController@showResidenceOf');
Route::GET('listaDeFavoritos/{id}','UserController@listaDeFavoritos');

Route::PUT('updateUser/{id}','UserController@updateUser');

Route::PUT('favoritar/{user_id}/{dorm_room_id}','UserController@favoritar');        // lista de favoritos
Route::PUT('desfavoritar/{user_id}/{dorm_room_id}','UserController@desfavoritar');  // 

Route::PUT('alugar/{user_id}/{dorm_room_id}','UserController@alugar');         // aluguel
Route::PUT('terminarAluguel/{user_id}','UserController@terminarAluguel');      //

Route::DELETE('deleteUser/{id}','UserController@deleteUser');

//DormRoom
Route::POST('createDormRoom','DormRoomController@createDormRoom');

Route::GET('showDormRoom/{id}','DormRoomController@showDormRoom');
Route::GET('listDormRoom','DormRoomController@listDormRoom');
Route::GET('locatario/{id}','DormRoomController@locatario');
Route::GET('proprietario/{id}','DormRoomController@proprietario');

Route::PUT('updateDormRoom/{id}','DormRoomController@updateDormRoom');

Route::PUT('addUserToDormRoom/{user_id}/{dorm_room_id}','DormRoomController@addUser');          //dono da republica
Route::PUT('removeUserFromDormRoom/{user_id}/{dorm_room_id}','DormRoomController@removeUser');  //

Route::DELETE('deleteDormRoom/{id}','DormRoomController@deleteDormRoom');

//Comment
Route::POST('createComment','CommentController@createComment');

Route::GET('showComment/{id}','CommentController@showComment');
Route::GET('listComment','CommentController@listComment');

Route::PUT('updateComment/{id}','CommentController@updateComment');

Route::PUT('addDormRoomToComment/{dorm_room_id}/{comment_id}','CommentController@addDormRoom');         //alvo do comentario
Route::PUT('removeDormRoomFromComment/{dorm_room_id}/{comment_id}','CommentController@removeDormRoom'); //

Route::PUT('addUserToComment/{user_id}/{comment_id}','CommentController@addUser');          //autor do comentario
Route::PUT('removeUserFromComment/{user_id}/{comment_id}','CommentController@removeUser');  //

Route::DELETE('deleteComment/{id}','CommentController@deleteComment');