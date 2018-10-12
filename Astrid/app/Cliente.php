<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='idcliente';

    public $timestamps=false;


    protected $fillable =[
    	'nombrecliente',
    	'apellidocliente',
    	'username',
    	'password',
    	'telefono',
    	'celular',
    	'direccion',
    	'email'
    ];

    protected $guarded =[

    ];
}
