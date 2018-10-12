<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'idcategoria'=>'required',
            'codigo'=>'required|max:12',
            'nombre'=>'required|max:50',
            'detalles'=>'required|max:250',
            'descripcion'=>'max:250',
            'imagen'=>'mimes:jpeg,tmp,png',
            'precio'=>'required|numeric'
        ];
    }
}
