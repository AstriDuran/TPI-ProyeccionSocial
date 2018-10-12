<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['nombre' => 'Artículos  de Oficina', 
             'descripcion' => 'Productos de madera decorados para la oficina.',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Artículos Decorativos', 
             'descripcion' => 'Productos decorativos elaborados en pintura artística y con arena',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Artículos de Cocina', 
             'descripcion' => 'Productos son elaborados en pintura artística.',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Artículos Utilitarios', 
             'descripcion' => 'Productos utilitarios de pintura artística',
             'estado' => '1	',
             'created_at' => $now, 
             'updated_at' => $now
         	],

        ]);
    }
}
