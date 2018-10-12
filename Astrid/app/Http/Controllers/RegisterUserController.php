<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use DB;

class RegisterUserController extends Controller
{
    public function activate($code)
    {
      $users = User::where('code',$code);
      $exist = $users->count();
      $user = $users->first();
      if($exist == 1 and $user->active == 0)
      {
        $id = $user->id;
        $username = $user->username;
        return view('auth.complete_record',compact('id','username'));
      }else{
        return redirect::to('/');
      }
    }
    public function complete(RegisterUserRequest $request,$id)
    {
      $user = User::find($id);
      $user->password = bcrypt($request->password);
      $user->active = 1;
      $user->nombre=$request->get('nombre');
      $user->apellido=$request->get('apellido');
      $user->telefono=$request->get('telefono');
      $user->save();
      
      return redirect::to('/');
    }
}
