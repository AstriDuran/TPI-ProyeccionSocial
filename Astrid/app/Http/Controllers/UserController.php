<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserRequest;
use App\User;
use Session; 
use DB;

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  
  public function index(Request $request)
  {
      if ($request)
      {
          $query=trim($request->get('searchText'));
          $users=DB::table('users')
          ->select('id',DB::raw("CONCAT(nombre,' ',apellido) as nombre"),'username','avatar','telefono','email')
          ->where('username','LIKE','%'.$query.'%')
          ->orwhere('nombre','LIKE','%'.$query.'%')
          ->orwhere('email','LIKE','%'.$query.'%')
          ->orderBy('id','desc')
          ->paginate(7);
          return view('usuario.index',["users"=>$users,"searchText"=>$query]);
      }
  }

  public function create()
  {   
    return view("usuario.create");
  }

  public function store (UserRequest $request)
  {   
      $user=new User;

      if(Input::hasfile('avatar')){
          $file=Input::file('avatar');
          $file->move(public_path().'/img/users',Carbon::now()->second.$file->getClientOriginalName());
          $user->avatar=Carbon::now()->second.$file->getClientOriginalName();
      }

      $user->username=$request->get('username');
      $user->nombre=$request->get('nombre');
      $user->apellido=$request->get('apellido');
      $user->password=bcrypt($request->get('password')); 
      $user->telefono=$request->get('telefono');
      $user->direccion=$request->get('direccion');
      $user->email=$request->get('email');
      $user->active='1';
      $user->save();

      Session::flash('store','¡El usuario fue almacenado!');
      return Redirect::to('usuario');
  }

  public function edit($id)
  {
      return view("usuario.edit",["user"=>User::findOrFail($id)]);
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
        'direccion' =>$request->get('direccion'),
        'avatar'=>Carbon::now()->second.$file->getClientOriginalName()]);
      }
      else{
          $affectedRows = User::where('id','=',$id)
          ->update(['username'=> $request->get('username'),
          'nombre'=> $request->get('nombre'),
          'apellido' =>$request->get('apellido'),
          'password' =>bcrypt($request->get('password')),
          'email' =>$request->get('email'),
          'telefono' =>$request->get('telefono'),
          'direccion' =>$request->get('direccion')]);
      }

      Session::flash('store','¡El usuario fue actualizado!');
      return Redirect::to('usuario');
  }

  public function destroy($id)
  {
      User::where('id','=',$id)->delete();
      Session::flash('delete','¡El usuario ha sido eliminado!');
      return Redirect::to('usuario');

  }

}
