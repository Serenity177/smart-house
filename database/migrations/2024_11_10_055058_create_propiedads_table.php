<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id('id_propiedad');
            $table->string('estado');
            $table->string('area');
            $table->string('direccion');
            $table->string('precio_propiedad');
            $table->unsignedBigInteger('id_usuario'); 
            $table->string('descripcion');
            $table->string('updated_at');
            $table->string('created_at');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};
