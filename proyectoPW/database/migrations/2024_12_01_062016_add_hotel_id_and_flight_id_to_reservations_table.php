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
            $table->unsignedBigInteger('hotel_id')->nullable()->after('user_id'); // Columna para la relación con hoteles
            $table->unsignedBigInteger('flight_id')->nullable()->after('hotel_id'); // Columna para la relación con vuelos
    
            // Llaves foráneas
            $table->foreign('hotel_id')->references('id')->on('hoteles')->onDelete('cascade');
            $table->foreign('flight_id')->references('id')->on('vuelos')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['flight_id']);
            $table->dropColumn(['hotel_id', 'flight_id']);
        });
    }
    
};
