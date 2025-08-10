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
        Schema::create('detallefacturas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('preciounitario',10,2);
            $table->decimal('totallinea',10,2);
        
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('id')->on('facturas');
            
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('id')->on('productos');
        
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
        Schema::dropIfExists('detallefacturas');
    }
};
