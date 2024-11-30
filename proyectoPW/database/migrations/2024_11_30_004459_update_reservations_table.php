<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (!Schema::hasColumn('reservations', 'hotel_name')) {
                $table->string('hotel_name')->nullable();
            }
            if (!Schema::hasColumn('reservations', 'check_in_date')) {
                $table->date('check_in_date')->nullable();
            }
            if (!Schema::hasColumn('reservations', 'check_out_date')) {
                $table->date('check_out_date')->nullable();
            }
            if (!Schema::hasColumn('reservations', 'hotel_price')) {
                $table->decimal('hotel_price', 8, 2)->nullable();
            }
            if (!Schema::hasColumn('reservations', 'flight_name')) {
                $table->string('flight_name')->nullable();
            }
            if (!Schema::hasColumn('reservations', 'flight_date')) {
                $table->date('flight_date')->nullable();
            }
            if (!Schema::hasColumn('reservations', 'flight_price')) {
                $table->decimal('flight_price', 8, 2)->nullable();
            }
            if (!Schema::hasColumn('reservations', 'total')) {
                $table->decimal('total', 8, 2)->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (Schema::hasColumn('reservations', 'hotel_name')) {
                $table->dropColumn('hotel_name');
            }
            if (Schema::hasColumn('reservations', 'check_in_date')) {
                $table->dropColumn('check_in_date');
            }
            if (Schema::hasColumn('reservations', 'check_out_date')) {
                $table->dropColumn('check_out_date');
            }
            if (Schema::hasColumn('reservations', 'hotel_price')) {
                $table->dropColumn('hotel_price');
            }
            if (Schema::hasColumn('reservations', 'flight_name')) {
                $table->dropColumn('flight_name');
            }
            if (Schema::hasColumn('reservations', 'flight_date')) {
                $table->dropColumn('flight_date');
            }
            if (Schema::hasColumn('reservations', 'flight_price')) {
                $table->dropColumn('flight_price');
            }
            if (Schema::hasColumn('reservations', 'total')) {
                $table->dropColumn('total');
            }
        });
    }
}
