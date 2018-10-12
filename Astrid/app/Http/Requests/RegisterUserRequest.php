<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'username'=>'required|max:30',
            'nombre'=>'required|max:30', 
            'apellido'=>'required|max:30',
            'telefono'=>'required|max:8|min:8|unique:users',
            'direccion'=>'max:250',   
            'email'=>'email|unique:users', 
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password',
        ];
    }
    
    public function messages()
    {
        return [
            'username.required' =>'El campo Username es requerido.',
            'username.max' =>'El Username es muy largo.',
            'nombre.required' =>'El nombre es requerido.',
            'nombre.max' =>'El nombre es muy largo.',
            'apellido.required' =>'El apellido es requerido.',
            'apellido.max' =>'El apellido es muy largo.',
            'email.email'=>'Correo electronico no es valido.',
            'email.unique'=>'Correo electronico ya existe.',
            'telefono.required'=>'El número de telefono es requerido.',
            'telefono.min'=>'El número de telefono debe tener 8 digitos.',
            'telefono.max'=>'El número de telefono debe tener 8 digitos.',
            'telefono.unique'=>'El número de telefono ya existe.',
            'password.required'=>'Contraseña es requerido.',
            'password_confirmation.required'=>'Confirmar contraseña es requerido.',
            'password.min'=>'Contraseña debe contener minimo 6 caracteres.',
            'password_confirmation.same'=>'Las contraseñas no coinciden.',
        ];
    }
}
