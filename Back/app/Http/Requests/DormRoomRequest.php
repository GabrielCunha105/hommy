<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\DormRoom;

class DormRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')){
            return [
                'address' => 'required|string',
                'numberOfRooms' => 'required|min:0|integer',
                'numberOfBathrooms' => 'required|min:0|integer',
                'numberOfResidents' => 'required|min:0|integer',
                'size' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0',
                'allowsAnimals' => 'required|boolean',
            ];
        }
        if ($this->isMethod('put')){
            return [
                'address' => 'string',
                'numberOfRooms' => 'min:0|integer',
                'numberOfBathrooms' => 'min:0|integer',
                'numberOfResidents' => 'min:0|integer',
                'size' => 'numeric|min:0',
                'price' => 'numeric|min:0',
                'allowsAnimals' => 'boolean',
            ];
        }
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
