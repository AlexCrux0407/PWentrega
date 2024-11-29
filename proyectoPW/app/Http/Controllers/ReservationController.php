<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        
    // Verifica si el usuario está autenticado
    //if (!Auth::check()) {
        //return redirect('/login')->with('error', 'Por favor, inicia sesión para ver tus reservaciones.');
   // }

    $reservations = auth()->user()->reservations()->where('status', 'pending')->get();
    $total = $reservations->sum('price');

    return view('reservacion', compact('reservations', 'pastReservations', 'total'));
    }


    

    public function cancel($id)
    {
        $reservation = auth()->user()->reservations()->find($id);

        if (!$reservation || $reservation->created_at->diffInHours(now()) > 48) {
            return response()->json(['success' => false, 'message' => 'No puedes cancelar esta reservación.']);
        }

        $reservation->update(['status' => 'cancelled']);

        return response()->json(['success' => true, 'message' => 'Reservación cancelada.']);
    }

    
}
