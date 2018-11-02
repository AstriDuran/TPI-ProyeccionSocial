<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallepedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedido', function (Blueprint $table) {
            
            $table->increments('iddetalle');
            $table->integer('idpedido')->unsigned();
            $table->foreign('idpedido')->references('idpedido')->on('pedido');
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('idproducto')->on('producto');
            $table->integer('cantidad');
            $table->float('subtotal')->nullable();
            $table->float('descuento')->nullable();
            $table->float('precioventa');
    
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
        Schema::dropIfExists('detallepedido');
    }
}
