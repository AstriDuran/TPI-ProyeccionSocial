<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Category;
use Carbon\Carbon;
use DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$productos = Product::take(8)->inRandomOrder()*/
        $productos=DB::table('producto as p')
        ->join('categoria as c','c.idcategoria','=','p.idcategoria')
        ->select('p.idproducto','p.nombre','p.foto','p.precio')
        ->where('p.estado','=','1')
        ->where('c.estado','=','1')
        ->take(8)->inRandomOrder()
        ->get();
        
        return view('store.home-page')->with([
            'productos' => $productos
        ]);
    }
    
}
