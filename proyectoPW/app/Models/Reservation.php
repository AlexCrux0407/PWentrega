<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Reservation::all();
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_type', 'description', 'price', 'status'];

    // Relación con usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
