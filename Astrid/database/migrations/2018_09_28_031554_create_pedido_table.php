<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {

            $table->increments('idpedido');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->float('montototal');
            $table->string('fechaentrega');
            $table->string('horaentrega');
            $table->string('direccion');
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->integer('estado')->default(0);
            $table->float('impuesto')->nullable();

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
        Schema::dropIfExists('pedido');
    }
}
