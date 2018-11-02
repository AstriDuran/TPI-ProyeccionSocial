<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;
use Session; 
use DB;

class PerfilUserController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function show($id)
    {
        return view("perfil_usuario.show",["user"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("perfil_usuario.edit",["user"=>User::findOrFail($id)]);
    }
    
    public function update(UserRequest $request,$id)
    {
        if(Input::hasfile('avatar')){
            
            $file=Input::file('avatar');
            $user=User::findOrFail($id);

            $oldavatar=$user->avatar;
            if(is_file(public_path().'/img/users/'.$oldavatar)){
                unlink(public_path().'/img/users/'.$oldavatar);
                } 
            $file->move(public_path().'/img/users',Carbon::now()->second.$file->getClientOriginalName());
            
            $affectedRows = User::where('id','=',$id)
            ->update(['username'=> $request->get('username'),
            'nombre'=> $request->get('nombre'),
            'apellido' =>$request->get('apellido'),
            'password' =>bcrypt($request->get('password')), 
            'email' =>$request->get('email'),
            'telefono' =>$request->get('telefono'),
            
            'avatar'=>Carbon::now()->second.$file->getClientOriginalName()]);

        }else{
            $affectedRows = User::where('id','=',$id)
            ->update(['username'=> $request->get('username'),
            'nombre'=> $request->get('nombre'),	
            'apellido' =>$request->get('apellido'),
            'password' =>bcrypt($request->get('password')),
            'email' =>$request->get('email'),
            'telefono' =>$request->get('telefono'),
            ]);
        }

        Session::flash('store','¡Sus datos han sido actualizados!');
        return $this->show($request->get('id'));
    }

}
