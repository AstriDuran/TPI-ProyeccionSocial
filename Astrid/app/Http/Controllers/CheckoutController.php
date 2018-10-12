<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\PedidoRequest;
use App\User;
use App\Pedido;
use App\DetallePedido;
use Session;
use DB;

class CheckoutController extends Controller 
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('store.checkout');
    }

    public function store(CheckoutRequest $request)
    {
     
         $tax= Cart::tax();
         $total=Cart::total();
         $cant=Cart::count(); 
 

        //Datos Recibidos 
        $pedido=new Pedido;
        $id = Auth::id();

        $pedido->iduser=$id;
        $pedido->fechaentrega=$request->get('fechaentrega');
        $pedido->horaentrega=$request->get('horaentrega');
        $pedido->direccion=$request->get('direccion');
        $pedido->montototal=$total;
        $pedido->impuesto=$tax;
        $pedido->estado='0';

         $pedido->save();

        //detalles
        $idproducto=$request->get('idproducto');
        $cantidad=$request->get('cantidad');
        $precio=$request->get('precio');

        $cont=0;

        while($cont <count($idproducto))
        {
            $detalle=new DetallePedido;
            $detalle->idpedido=$pedido->idpedido;
            $detalle->idproducto=$idproducto[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->precioventa=$precio[$cont];
                $subtotal=($precio[$cont]*$cantidad[$cont]);
            $detalle->subtotal=$subtotal; 
            $detalle->descuento='0';
            $detalle->save();
        
            $cont=$cont+1;             
        }
        
        Cart::instance('default')->destroy();
        return redirect()->route('confirmation.index')->with('success_message', '¡Gracias, su pedido se ha realizado satisfactoreamente!');
    }
}
