<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';

    protected $fillable = [
        'origen',
        'destino',
        'fecha_salida',
        'fecha_llegada',
        'precio',
        'aerolinea',
        'escalas',
        'disponibilidad',
        'duracion', 
    ];

    public $timestamps = true;
}
