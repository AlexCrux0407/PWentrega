<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'check_in_date',
        'check_out_date',
        'hotel_price',
        'flight_name',
        'flight_date',
        'flight_price',
        'total',
        'created_at',
        'updated_att'
    ];
}
