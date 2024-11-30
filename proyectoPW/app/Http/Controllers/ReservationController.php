<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->withErrors('Debes estar autenticado para realizar una reservación.');
        }

        $total = $request->hotel_price + $request->flight_price;

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'hotel_name' => $request->hotel_name,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'hotel_price' => $request->hotel_price,
            'flight_name' => $request->flight_name,
            'flight_date' => $request->flight_date,
            'flight_price' => $request->flight_price,
            'total' => $total,
        ]);

        session(['reservations' => $reservation]);

        return redirect()->route('reservations.reservacion');
    }

    public function reservacion()
    {
        return view('reservations.reservacion');
    }

    public function userReservations()
    {
        $userReservations = Auth::user()->reservations;
        return view('reservations.user', compact('userReservations'));
    }
}
