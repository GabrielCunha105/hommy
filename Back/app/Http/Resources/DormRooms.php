<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DormRooms extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'address' => $this->address,
            'numberOfRooms' => $this->numberOfRooms,
            'numberOfBathrooms' => $this->numberOfBathrooms,
            'numberOfResidents' => $this->numberOfResidents,
            'size' => $this->size,
            'price' => $this->price,
            'allowsAnimals' => $this->allowsAnimals,
        ];
    }
}
