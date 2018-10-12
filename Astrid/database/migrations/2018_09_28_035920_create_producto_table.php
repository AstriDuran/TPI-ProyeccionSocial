<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('idproducto');
            $table->integer('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('idcategoria')->on('categoria');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('detalles')->nullable();
            $table->string('foto')->nullable();
            $table->float('precio');
            $table->integer('stock');
            $table->integer('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
