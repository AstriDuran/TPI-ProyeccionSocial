<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaRequest;
use Session;
use DB;

class CategoriaController extends Controller
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
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('categoria.index',["categorias"=>$categorias,"searchText"=>$query]); 
        }
    }

    public function create()
    {
        return view("categoria.create");
    }
    
    public function store (CategoriaRequest $request)
    {
        $categoria=new Category;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->estado='1';
        $categoria->save();

        Session::flash('store','¡Categoria Almacenada!');
        return Redirect::to('categoria');

    }
    
    public function edit($id)
    {
        return view("categoria.edit",["categoria"=>Category::findOrFail($id)]);
    }

    public function update(CategoriaRequest $request,$id)
    {
        $categoria=Category::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        
        Session::flash('store','¡Categoria Actualizada!');
        return Redirect::to('categoria');
    }
    
    public function destroy($id)
    {
        Category::where('idcategoria','=',$id)->delete();
        Session::flash('destroy','¡Categoria eliminada!');
        return Redirect::to('categoria');

    }

    public function estado($id)
    {
        $categoria=Category::findOrFail($id);
        if($categoria->estado=='0'){
             $categoria->estado='1';
             Session::flash('estado','¡Categoria cambio a estado: Activo!');
        }
         else{
            $categoria->estado='0';
            Session::flash('estado','¡Categoria cambio a estado: Inactiva!');
         }
    
        $categoria->update();
        return Redirect::to('categoria');
    }
}
