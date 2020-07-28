<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\DormRoom;
use Comment;
use App\Http\Requests\UserRequest;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Create
    public function createUser(UserRequest $request) {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->dateOfBirth = $request->dateOfBirth;
        $this->gender = $request->gender;
        $this->isTenant = $request->isTenant;
        $this->registrationDate = $request->registrationDate;
        $this->password = $request->password;
        $this->cpf = $request->cpf;
        if($request->college) {
            $this->college = $request->college;
        }
        $this->save();
    }

    //Update
    public function updateUser(UserRequest $request) {
        if($request->name) {
            $this->name = $request->name;
        }
        if($request->email) {
            $this->email = $request->email;
        }
        if($request->phone) {
            $this->phone = $request->phone;
        }
        if($request->dateOfBirth) {
            $this->dateOfBirth = $request->dateOfBirth;
        }
        if($request->gender) {
            $this->gender = $request->gender;
        }
        if($request->isTenant) {
            $this->isTenant = $request->isTenant;
        }
        if($request->registrationDate) {
            $this->registrationDate = $request->registrationDate;
        }
        if($request->password) {
            $this->password = $request->password;
        }
        if($request->cpf) {
            $this->cpf = $request->cpf;
        }
        if($request->college) {
            $this->college = $request->college;
        }

        $this->save();
    }

    //Update relação c/ aluguel
    public function alugar($dorm_room_id) {
        $dormRoom = DormRoom::findOrFail($dorm_room_id);
        $this->dorm_room_id = $dorm_room_id;
        $this->save();
    }
    
    public function terminarAluguel() {
        $this->dorm_room_id = null;
        $this->save();
    }

    //Relações
    public function dormRooms(){                //republicas anunciadas
        return $this->hasMany('App\DormRoom');
    }

    public function comments() {                //comentarios publicados
        return $this->hsMany('App\Comment');
    }

    public function dormRoom(){                 //republica alugada
        return $this->belongsTo('App\DormRoom');
    }

    public function favoritas(){                //lista de favoritos
        return $this->belongsToMany('App\DormRoom');
    }
       
}
