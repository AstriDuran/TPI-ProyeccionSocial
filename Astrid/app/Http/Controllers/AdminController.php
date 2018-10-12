<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AdminRequest;
use App\Admin;
use Validator;
use Session; 
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $admins=DB::table('admins')
            ->select('id','name','email','telefono','active','avatar','password')
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('administrador.index',["admins"=>$admins,"searchText"=>$query]);
        }
    }
    public function create()
    {   
        return view("administrador.create");
    }

    public function store (AdminRequest $request)
    {
        $admin=new Admin;

        if(Input::hasfile('avatar')){
            $file=Input::file('avatar');
            $file->move(public_path().'/img/users',Carbon::now()->second.$file->getClientOriginalName());
            $admin->avatar=Carbon::now()->second.$file->getClientOriginalName();
        }

        $admin->name=$request->get('name');
        $admin->password=bcrypt($request->get('password')); 
        $admin->email=$request->get('email'); 
        $admin->telefono=$request->get('telefono');
        $admin->active='1';
        $admin->save();

        Session::flash('store','¡Administrador Almacenado!');
        return Redirect::to('administrador');
    }

    public function edit($id)
    {
        return view("administrador.edit",["admin"=>Admin::findOrFail($id)]);
    }
    
    public function update(AdminRequest $request,$id)
    {
        
        if(Input::hasfile('avatar')){
            
            $file=Input::file('avatar');
            $admin=Admin::findOrFail($id);

            $oldavatar=$admin->avatar;
            if(is_file(public_path().'/img/users/'.$oldavatar)){
                unlink(public_path().'/img/users/'.$oldavatar);
                } 
            $file->move(public_path().'/img/users',Carbon::now()->second.$file->getClientOriginalName());
            
            $affectedRows = Admin::where('id','=',$id)
            ->update(['name'=> $request->get('name'),
            'password' =>bcrypt($request->get('password')), 
            'email' =>$request->get('email'),
            'telefono' =>$request->get('telefono'),
            'active' =>$request->get('active'),
            'avatar'=>Carbon::now()->second.$file->getClientOriginalName()]);

        }else{
            $affectedRows = Admin::where('id','=',$id)
            ->update(['name'=> $request->get('name'),
            'password' =>bcrypt($request->get('password')),
            'email' =>$request->get('email'),
            'telefono' =>$request->get('telefono'),
            'active' =>$request->get('active')]);
        }
        Session::flash('store','¡Administrador actualizado!');
        return Redirect::to('administrador');
    }
    
    public function destroy($id)
    {
        $affectedRows = Admin::where('id','=',$id)->delete();
        Session::flash('store','¡Administrador eliminado!');
        return Redirect::to('administrador');

    }

    public function estado($id)
    {
        $admin=Admin::findOrFail($id);
        if($admin->active=='0'){
             $admin->active='1';
             Session::flash('estado','¡Administrador cambio a estado: Activo!');
        }
         else{
            $admin->active='0';
            Session::flash('estado','¡Administrador cambio a estado: Inactiva!');
         }
    
        $admin->update();
        return Redirect::to('administrador');
    }

}
