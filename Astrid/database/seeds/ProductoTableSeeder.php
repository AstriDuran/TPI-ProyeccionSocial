<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'idcategoria' => 1,
                'codigo' => 'CA-PO-PA-00' . $i,
                'nombre' => 'Calendario ' . $i,
               	'descripcion' => 'Descripcion producto N° ' . $i,
                'detalles' => 'Medidas'. [5, 6, 7][array_rand([13, 14, 15])] . ' X ' . [5, 6, 7][array_rand([1, 2, 3])] . 'cm',
                'foto' => 'Calendario ' . $i. '.png',
                'precio' => rand(150, 999),
                'stock' => 1,
                'estado' => 1,
              
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'idcategoria' => 2,
                'codigo' => 'CA-PD-PA-02' . $i,
                'nombre' => 'Baeta Cuadrada ' . $i,
               	'descripcion' => 'Descripcion producto N° ' . $i,
                'detalles' => 'Medidas'. [5, 6, 7][array_rand([13, 14, 15])] . ' X ' . [5, 6, 7][array_rand([1, 2, 3])] . 'cm',
                'foto' => 'Baeta Cuadrada ' . $i. '.png',
                'precio' => rand(150, 999),
                'stock' => 1,
                'estado' => 1,
              
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'idcategoria' => 3,
                'codigo' => 'CA-PC-PA-03' . $i,
                'nombre' => 'Caja para Té ' . $i,
               	'descripcion' => 'Descripcion producto N° ' . $i,
                'detalles' => 'Medidas'. [5, 6, 7][array_rand([13, 14, 15])] . ' X ' . [5, 6, 7][array_rand([1, 2, 3])] . 'cm',
                'foto' => 'Caja para Te ' . $i. '.png',
                'precio' => rand(150, 999),
                'stock' => 1,
                'estado' => 1,
              
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'idcategoria' => 4,
                'codigo' => 'CA-PU-PA-04' . $i,
                'nombre' => 'Juego de Cofres ' . $i,
               	'descripcion' => 'Descripcion producto N° ' . $i,
                'detalles' => 'Medidas'. [5, 6, 7][array_rand([13, 14, 15])] . ' X ' . [5, 6, 7][array_rand([1, 2, 3])] . 'cm',
                'foto' => 'Juego de Cofres ' . $i. '.png',
                'precio' => rand(150, 999),
                'stock' => 1,
                'estado' => 1,
              
            ]);
        }
    }
}
