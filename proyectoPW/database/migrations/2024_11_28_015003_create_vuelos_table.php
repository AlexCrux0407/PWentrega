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
            $table->id(); 
            $table->string('origen'); 
            $table->string('destino'); 
            $table->date('fecha_salida'); 
            $table->date('fecha_llegada'); 
            $table->decimal('precio', 8, 2); 
            $table->string('aerolinea'); 
            $table->integer('escalas'); 
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
        Schema::dropIfExists('vuelos');
    }
};
