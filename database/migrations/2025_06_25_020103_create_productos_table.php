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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio',10,5);
            $table->decimal('preciocompra',10,4);
            $table->integer('stock');

            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');

            $table->unsignedBigInteger('idmarca');
            $table->foreign('idmarca')->references('id')->on('marcas');

            $table->date('fechacreacion');
            $table->boolean('estado');
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
        Schema::dropIfExists('productos');
    }
};
