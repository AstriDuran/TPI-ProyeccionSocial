<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name'=>'required|max:30', 
                    'email'=>'required|email|unique:admins', 
                    'telefono'=>'required|max:8|min:8|unique:admins',
                    'password'=>'required|min:6',
                    'password_confirmation'=>'required|same:password',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'=>'required|max:30', 
                    'email' => 'required|email|unique:admins,email,'.$this->get('id'),
                    'telefono'=>'required|max:8|min:8|unique:admins,telefono,'.$this->get('id'),
                    'password'=>'required|min:6',
                    'password_confirmation'=>'required|same:password',
                 ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' =>'El nombre es requerido.',
            'email.required'=>'Correo electronico es requerido.',
            'email.email'=>'Correo electronico no es valido.',
            'email.unique'=>'Correo electronico ya existe.',
            'telefono.required'=>'El número de telefono es requerido.',
            'telefono.unique'=>'El número de telefono ya existe.',
            'telefono.min'=>'El número de telefono debe tener 8 digitos.',
            'telefono.max'=>'El número de telefono debe tener 8 digitos.',
            'password.required'=>'Contraseña es requerido.',
            'password_confirmation.required'=>'Confirmar contraseña es requerido.',
            'password.min'=>'Contraseña debe contener minimo 6 caracteres.',
            'password_confirmation.same'=>'Las contraseñas no coinciden.',
        ];
    }
}
