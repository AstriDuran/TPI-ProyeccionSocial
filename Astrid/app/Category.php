<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categoria';

    protected $primaryKey='idcategoria';

    public $timestamps=false;


    protected $fillable =[
    	'nombrecategoria',
        'descripcioncategoria',
        'condicion',
    	'slug'
    ];

    protected $guarded =[

    ];


    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
