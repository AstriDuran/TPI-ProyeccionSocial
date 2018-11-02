<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProductoRequest;
use App\Product;
use Carbon\Carbon;
use Session;
use DB;

class ProductoController extends Controller 
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
            $productos=DB::table('producto as p')
            ->join('categoria as c','c.idcategoria','=','p.idcategoria')
            ->select('p.idproducto','p.codigo','p.nombre','p.detalles','p.descripcion','p.foto','p.precio','p.estado','c.nombre as categoria')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('p.idcategoria','p.idproducto','desc')
            ->paginate(7);
            return view('producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $categorias=DB::table('categoria as c') 
        ->select('c.idcategoria','c.nombre as categoria')
        ->where('estado','=','1')->get();
        
    	return view("producto.create",["categorias"=>$categorias]);
    }

    public function store (ProductoRequest $request)
    {
        $producto=new Product;

        if(Input::hasfile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/img/productos',Carbon::now()->second.$file->getClientOriginalName());
            $producto->foto=Carbon::now()->second.$file->getClientOriginalName();
        }

        $producto->codigo=$request->get('codigo');
        $producto->nombre=$request->get('nombre');
        $producto->detalles=$request->get('detalles');
        $producto->descripcion=$request->get('descripcion');
        $producto->idcategoria=$request->get('idcategoria');
        $producto->precio=$request->get('precio');
        $producto->estado='1';
        $producto->save();

        Session::flash('store','¡El producto fue almacenado!');
        return Redirect::to('producto');

    }

    public function show($id)
    {
        return view("producto.show",["producto"=>Product::findOrFail($id)]);
    }

    public function edit($id)
    {
        $categorias=DB::table('categoria as c')
        ->select('c.idcategoria','c.nombre as categoria')
        ->where('estado','=','1')->get();

        return view("producto.edit",["categorias"=>$categorias,"producto"=>Product::findOrFail($id)]);
    }

    public function update(ProductoRequest $request,$id)
    {
        if(Input::hasfile('foto')){
            
            $file=Input::file('foto');
            $producto=Product::findOrFail($id);
            $fotovieja=$producto->FOTO;
            if(is_file(public_path().'/img/productos/'.$fotovieja)){
                unlink(public_path().'/img/productos/'.$fotovieja);
                } 
            $file->move(public_path().'/img/productos',Carbon::now()->second.$file->getClientOriginalName());
            
            $affectedRows = Product::where('idproducto','=',$id)
            ->update(['codigo'=>$request->get('codigo'),
            'nombre'=> $request->get('nombre'),
            'detalles' =>$request->get('detalles'),
            'descripcion' =>$request->get('descripcion'),
            'idcategoria' =>$request->get('idcategoria'),
            'precio' =>$request->get('precio'),
            'foto'=>Carbon::now()->second.$file->getClientOriginalName()]);

        }else{
            $affectedRows = Product::where('idproducto','=',$id)
            ->update(['codigo'=>$request->get('codigo'),
            'nombre'=> $request->get('nombre'),
            'detalles' =>$request->get('detalles'),
            'descripcion' =>$request->get('descripcion'),
            'idcategoria' =>$request->get('idcategoria'),
            'precio' =>$request->get('precio')]);
        }
        Session::flash('store','¡El producto fue actualizado!');
        return Redirect::to('producto');
    }
    
    public function destroy($id)
    {
        Product::where('idproducto','=',$id)->delete();
        Session::flash('delete','¡El producto fue eliminado!');
        return Redirect::to('producto');

    }

    public function estado($id)
    {
        $producto=Product::findOrFail($id);

        if($producto->estado=='0'){
            $producto->estado='1';
            Session::flash('estado','¡Producto cambio a estado: Activo!');
        }
         else{
            $producto->estado='0';
            Session::flash('estado','¡Producto cambio a estado: Inactivo!');
         }
        $producto->update();
        return Redirect::to('producto'); 
    }

}
