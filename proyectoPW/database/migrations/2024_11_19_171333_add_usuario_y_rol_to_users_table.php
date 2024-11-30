<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('usuario')->unique()->after('id'); // Agregar columna 'usuario'
            $table->enum('rol', ['usuario', 'administrador'])->default('usuario')->after('password'); // Agregar columna 'rol'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['usuario', 'rol']); // Eliminar columnas 'usuario' y 'rol'
        });
    }
};

