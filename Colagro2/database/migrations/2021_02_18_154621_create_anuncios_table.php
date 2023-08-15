<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Cat_nombre');           
            $table->timestamps();
        });

        Schema::create('anuncios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idusuario');
            $table->string('Nusuario');
            $table->string('Nproducto');
            $table->string('Descripcion',500);
            $table->string('Precio');
            $table->string('Direccion');
            $table->string('telefono');
            $table->String('Imagen');
            $table->String('Imagen2');
            $table->String('Imagen3');
            $table->unsignedBigInteger('Cat_id')->nullable();
            $table->string('Cat_nombre')->nullable(); 
            $table->foreign('Cat_id')->references('id')->on('categorias');             
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
        Schema::dropIfExists('anuncios');
        Schema::dropIfExists('categorias');
    }
}
