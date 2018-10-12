<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table='oferta';

    protected $primaryKey='idoferta';

    public $timestamps=false;


    protected $fillable =[
    	'idproducto',
    	'descuento',
    	'descripcionoferta'
    ];

    protected $guarded =[

    ];
}
