<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use Comment;
use App\Http\Requests\DormRoomRequest;

class DormRoom extends Model
{
    // Create
    public function createDormRoom(DormRoomRequest $request) {
        $this->address = $request->address;
        $this->numberOfRooms = $request->numberOfRooms;
        $this->numberOfBathrooms = $request->numberOfBathrooms;
        $this->numberOfResidents = $request->numberOfResidents;
        $this->size = $request->size;
        $this->price = $request->price;
        $this->allowsAnimals = $request->allowsAnimals;
        $this->save();
    }

    //Update
    public function updateDormRoom(DormRoomRequest $request) {
        if($request->address) {
            $this->address = $request->address;
        }
        if($request->numberOfRooms) {
            $this->numberOfRooms = $request->numberOfRooms;
        }
        if($request->numberOfBathrooms) {
            $this->numberOfBathrooms = $request->numberOfBathrooms;
        }
        if($request->numberOfResidents) {
            $this->numberOfResidents = $request->numberOfResidents;
        }
        if($request->size) {
            $this->size = $request->size;
        }
        if($request->price) {
            $this->price = $request->price;
        }
        if($request->allowsAnimals) {
            $this->allowsAnimals = $request->allowsAnimals;
        }

        $this->save();
    }

    //Relações
    public function user(){                     //Proprietario
        return $this->belongsTo('App\User');
    }

    public function userLocatario(){            //Locatario
        return $this->hasOne('App\User');
    }

    public function comments() {                //comentarios
        return $this->hasMany('App\Comment');
    }

    public function userFavoritas(){            //listas de favoritos
        return $this->belongsToMany('App\User');
    }
    
}
