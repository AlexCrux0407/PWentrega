<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('flight_date')->nullable()->change(); // Permitir valores nulos
        });
    }
    
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('flight_date')->nullable(false)->change(); // Revertir a obligatorio
        });
    }
    
};
