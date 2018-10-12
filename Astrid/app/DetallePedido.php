<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table='detallepedido';

    protected $primaryKey='iddetalle';

    public $timestamps=false;


    protected $fillable =[
    	'idpedido',
    	'idproducto',
        'cantidad',
        'precio',
    	'descuento'
    ];

    protected $guarded =[

    ];
}
