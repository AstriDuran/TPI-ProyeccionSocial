<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\OfertaRequest;
use App\Oferta;
use Session;
use DB;


class OfertaController extends Controller
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
            $ofertas=DB::table('oferta as o')
            ->join('producto as p','p.idproducto','=','o.idproducto')
            ->select('o.idoferta','o.idproducto','o.descuento','o.descripcion','o.estado','p.codigo','p.nombre as producto')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('o.idoferta','desc')
            ->paginate(7);
            return view('oferta.index',["ofertas"=>$ofertas,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        $productos=DB::table('producto as p')
        ->select('p.idproducto','p.nombre as producto')
        ->where('p.estado','=','1')->get();

        return view("oferta.create",["productos"=>$productos]);
    }
    
    public function store (OfertaRequest $request)
    {
        $oferta=new Oferta;
        $oferta->idproducto=$request->get('idproducto');
        $oferta->descuento=$request->get('descuento');
        $oferta->descripcion=$request->get('descripcion');
        $oferta->estado='0';
        $oferta->save();

        Session::flash('store','¡La oferta fue almacenada!');
        return Redirect::to('oferta');

    }
    
    public function show($id)
    {
        return view("oferta.show",["oferta"=>Oferta::findOrFail($id)]);
    }
    
    public function edit($id)
    {
        $productos=DB::table('producto as p')
        ->select('p.idproducto','p.nombre as producto')
        ->where('p.estado','=','1')->get();

        return view("oferta.edit",["productos"=>$productos,"oferta"=>Oferta::findOrFail($id)]);
    }
    
    public function update(OfertaRequest $request,$id)
    {
        $oferta=Oferta::findOrFail($id); 
        $oferta->idproducto=$request->get('idproducto');
        $oferta->descuento=$request->get('descuento');
        $oferta->descripcion=$request->get('descripcion');
        $oferta->update();

        Session::flash('store','¡La oferta fue actualizada!');
        return Redirect::to('oferta');
    }
    
    public function destroy($id)
    {
        Oferta::where('idoferta','=',$id)->delete();
        Session::flash('delete','¡La oferta fue eliminada!');
        return Redirect::to('oferta');

    }

    public function estado($id)
    {
        $oferta=Oferta::findOrFail($id);

        if($oferta->estado=='0'){
            $oferta->estado='1';
            Session::flash('estado','¡Oferta cambio a estado: Activo!');
        }    
         else{
             $oferta->estado='0';
            Session::flash('estado','¡Oferta cambio a estado: Inactiva!');
         }

        $oferta->update();
        return Redirect::to('oferta');
    }

    public function mostraroferta()
    {
      $ofertas=DB::table('oferta as o')
      ->join('producto as p','p.idproducto','=','o.idproducto')
      ->select('o.idoferta','o.idproducto','o.descuento','o.descripcion','o.estado','p.codigo','p.nombre as producto','p.foto','p.precio')
      ->orderBy('o.idoferta','desc')
      ->paginate(7);

       $categorias=DB::table('categoria as c')
        ->select('c.idcategoria','c.nombre as categoria')
        ->where('c.estado','=','1')->get();

      return view('inicio.mostraroferta',["ofertas"=>$ofertas,"categorias"=>$categorias]);
        
    }
}
