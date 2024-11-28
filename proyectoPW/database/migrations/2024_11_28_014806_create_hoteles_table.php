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
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id(); // Campo ID autoincremental
            $table->string('nombre'); // Nombre del hotel
            $table->string('ciudad'); // Ciudad del hotel
            $table->string('categoria'); // Categoría del hotel (e.g., 5 estrellas)
            $table->decimal('precio_por_noche', 8, 2); // Precio por noche
            $table->integer('disponibilidad'); // Habitaciones disponibles
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
};
