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
            ['nombre' => 'Confecciones', 
             'descripcion' => 'Productos confeccionados.',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Marroquineria', 
             'descripcion' => 'Productos de cuero.',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Serigrafia', 
             'descripcion' => 'Estampados en todo tipo de material.',
             'estado' => '1',
             'created_at' => $now, 
             'updated_at' => $now
         	],
         	['nombre' => 'Acrilico', 
             'descripcion' => 'Productos de acrilico',
             'estado' => '1	',
             'created_at' => $now, 
             'updated_at' => $now
         	],

        ]);
    }
}
