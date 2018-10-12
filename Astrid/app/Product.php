<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='producto';

    protected $primaryKey='idproducto';

    public $timestamps=false;


    protected $fillable =[
        'idcategoria',
        'codigo',
        'nombreproducto',
        'descripcionproducto',
        'foto',
        'precio',
        'puntuacion',
        'slug',
        'detalles',
        'featured'

    ];

    protected $guarded =[

    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }
}
