<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='Pedido';

    protected $primaryKey='idpedido';

    public $timestamps=false;


    protected $fillable =[
    	'idcliente',
        'montototal',
        'fechaentrega',
        'horaentrega',
        'direccion',
    	'estadopedido',
    	'impuesto'
    ];

    protected $guarded =[

    ];

}
