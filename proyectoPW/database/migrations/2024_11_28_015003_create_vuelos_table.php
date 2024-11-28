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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id(); // Campo ID autoincremental
            $table->string('origen'); // Origen del vuelo
            $table->string('destino'); // Destino del vuelo
            $table->date('fecha_salida'); // Fecha de salida
            $table->date('fecha_llegada'); // Fecha de llegada
            $table->decimal('precio', 8, 2); // Precio del vuelo con dos decimales
            $table->string('aerolinea'); // Aerolínea
            $table->integer('escalas'); // Número de escalas
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
        Schema::dropIfExists('vuelos');
    }
};
