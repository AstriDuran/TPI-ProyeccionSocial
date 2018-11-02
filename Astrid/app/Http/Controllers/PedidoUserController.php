<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\DetallePedido;
use Carbon\Carbon;
use App\Pedido;
use App\User;
use Session; 
use PDF;
use DB;

class PedidoUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index($id)
    {
        $pedidos=DB::table('pedido as p')
        ->join('users as us','us.id','=','p.iduser')
        ->select('us.id',DB::raw("CONCAT(nombre,' ',apellido) as nombre"),'us.telefono','p.idpedido','p.direccion','p.fechaentrega','p.horaentrega','p.estado')
        ->where('us.id','=',$id)
        ->orderBy('p.estado')
        ->paginate(7);

        return view('perfil_usuario.pedidos',["pedidos"=>$pedidos]);
       
    }
    
    public function show($id)
    {
        $pedido=DB::table('pedido as p')
        ->join('users as us','us.id','=','p.iduser')
        ->join('detallepedido as det','det.idpedido','=','p.idpedido')
        ->join('producto as pro','pro.idproducto','=','det.idproducto')
        ->select(
            DB::raw("CONCAT(us.nombre,' ',us.apellido) as nombre"),
            'us.id','us.telefono','p.idpedido','p.direccion','p.fechaentrega','p.horaentrega','p.estado',
            'p.montototal','det.iddetalle','det.idproducto','det.cantidad','det.precioventa','det.subtotal','pro.codigo',
            'pro.detalles','pro.nombre as producto')
        ->where('p.idpedido','=',$id) 
        ->get();
       
       return view('perfil_usuario.pedido_show',["pedido"=>$pedido]); 
    }

    public function reportepdf($id)
    {
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pedido=DB::table('pedido as p')
        ->join('users as us','us.id','=','p.iduser')
        ->join('detallepedido as det','det.idpedido','=','p.idpedido')
        ->join('producto as pro','pro.idproducto','=','det.idproducto')
        ->select(
            DB::raw("CONCAT(us.nombre,' ',us.apellido) as nombre"),
            'us.id','us.telefono','p.idpedido','p.direccion','p.fechaentrega','p.horaentrega','p.estado',
            'p.montototal','det.iddetalle','det.idproducto','det.cantidad','det.precioventa','det.subtotal','pro.codigo',
            'pro.detalles','pro.nombre as producto')
        ->where('p.idpedido','=',$id) 
        ->get();

        foreach ($pedido as $det ) 
        {   
            $t=$det->horaentrega;
            $h=$t[0].$t[1];
            $m=$t[3].$t[4];

            $time = Carbon::now();
            $time->setTime($h,$m)->toDateTimeString();
            $time = $time->format('h:i A');
            $det->horaentrega=$time;
        
        }

        $pdf = PDF::loadView('perfil_usuario.reporte',["pedido"=>$pedido,"fecha"=>$fecha]);
        $papel_tamaño = array(0,0,216,279);
        $pdf->setPaper("letter" ,'portrait');
        //dd($pdf);
        return $pdf->stream('reporte.pdf');
    }
}
