<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_id', 
        'check_in_date',
        'check_out_date',
        'hotel_price',
        'flight_id', 
        'flight_date',
        'flight_price',
        'total',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id'); // Relación con hoteles
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'flight_id'); // Relación con vuelos
    }
}
