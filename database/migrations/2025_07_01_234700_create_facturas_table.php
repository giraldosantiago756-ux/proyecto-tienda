<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('idcliente');
            $table->foreign('idcliente')->references('id')->on('clientes');
            
            $table->unsignedBigInteger('idestado');
            $table->foreign('idestado')->references('id')->on('estados');

            $table->date('fecha');
            
            $table->unsignedBigInteger('idmodopago');
            $table->foreign('idmodopago')->references('id')->on('modopagos');

            $table->decimal('subtotal');
            $table->decimal('impuestos');
            $table->decimal('total');
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
        Schema::dropIfExists('facturas');
    }
};
