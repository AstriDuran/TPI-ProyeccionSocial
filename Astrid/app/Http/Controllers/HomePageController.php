<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::take(8)->inRandomOrder()->get();

        return view('store.home-page')->with([
            'productos' => $productos
        ]);
    }
}
