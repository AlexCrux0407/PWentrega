<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hoteles';

    protected $fillable = [
        'nombre',
        'ciudad',
        'categoria',
        'precio_por_noche',
        'disponibilidad',
    ];

    public $timestamps = true;
}
