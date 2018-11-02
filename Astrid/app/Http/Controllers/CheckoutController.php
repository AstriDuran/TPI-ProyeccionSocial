<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PedidoRequest;
use App\DetallePedido;
use Carbon\Carbon;
use App\Pedido;
use App\User;
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

        try{
            DB::beginTransaction();

            $pedido->iduser=$id;
            $pedido->fechaentrega=$request->get('fechaentrega');
            $pedido->horaentrega=$request->get('horaentrega');
            $pedido->direccion=$request->get('direccion');
            $pedido->montototal=$total;
            $pedido->impuesto=$tax;
            $pedido->estado='0';

             $pedido->save();  //Guardar pedido

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
                $detalle->save(); // Guardar detalle del pedido
            
                $cont=$cont+1;             
            }

            DB::commit();

            }catch(\Exception $e)
                {
                DB::rollback();
            }   

        //Email
        $usuario=User::findOrFail($id); // Obtiene los datos del usuario.
        $pedido=Pedido::findOrFail($pedido->idpedido); // Obtiene informacion del pedido.

        //Camabiar formato de la hora 
            $t=$pedido->horaentrega;
            $h=$t[0].$t[1];
            $m=$t[3].$t[4];

            $time = Carbon::now();
            $time->setTime($h,$m)->toDateTimeString();
            $time = $time->format('h:i A');
            $pedido->horaentrega=$time;
    

        $datos = array('pedido'=>$pedido,'usuario'=>$usuario);
        $this->Email($datos,$usuario->email);

        Cart::instance('default')->destroy();
        
        return redirect()->route('confirmation.index')->with('success_message', '¡Gracias, su pedido se ha realizado satisfactoreamente!');
    }

    public function Email($datos,$email){
      Mail::send('email.confirmacion_pedido',$datos, function($message) use ($email){
        $message->subject('Confirmacion del Pedido');
        $message->to($email);
        $message->from('prodive2018@gmail.com','PRODIVE');
      });
    }
}
