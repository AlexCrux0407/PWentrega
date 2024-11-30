<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('hotel_name');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('hotel_price', 8, 2);
            $table->string('flight_name');
            $table->date('flight_date');
            $table->decimal('flight_price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
