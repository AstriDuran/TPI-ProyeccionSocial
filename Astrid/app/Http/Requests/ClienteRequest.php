<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        return [
            
            'name' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'telefono'=>'required|string|max:8|min:8',
            'direccion'=>'required|string|max:250',
            'email' => 'required|string|email|max:60',
            'password' =>'required|confirmed|min:5',
            'avatar'=>'mimes:jpeg,tmp,png',
        ];
    }
}
