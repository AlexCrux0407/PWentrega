<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Vuelo;
use Carbon\Carbon;
use App\Models\TermsAndConditions;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors('Debes estar autenticado para realizar una reservación.');
        }

        $hotel = Hotel::find($request->hotel_id);
        $vuelo = Vuelo::find($request->vuelo_id);

        if (!$hotel || !$vuelo) {
            return back()->withErrors('Selección de hotel o vuelo inválida.');
        }

        $checkInDate = Carbon::parse($request->check_in_date);
        $checkOutDate = Carbon::parse($request->check_out_date);
        $noches = $checkInDate->diffInDays($checkOutDate);

        $totalHotel = $hotel->precio_por_noche * $noches;
        $totalVuelo = $vuelo->precio;
        $total = $totalHotel + $totalVuelo;

        // Crear la reservación con las relaciones
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'hotel_id' => $hotel->id,
            'flight_id' => $vuelo->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'hotel_price' => $hotel->precio_por_noche,
            'flight_price' => $vuelo->precio,
            'total' => $total,
            'created_at' => now()
        ]);

        // Almacenar la reservación en la sesión
        session(['reservations' => $reservation->load('hotel', 'vuelo')->toArray()]);

        return redirect()->route('reservations.reservacion');
    }

    public function reservacion()
    {
        $reservation = session('reservations');

        if (!$reservation) {
            return redirect()->route('reservations.create')->withErrors('No hay reservaciones para mostrar.');
        }

        return view('reservations.reservacion');
    }

    public function cancelReservation($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->route('reservations.user')->withErrors('Reservación no encontrada.');
        }

        $reservation->delete();

        return redirect()->route('reservations.user')->with('success', 'Reservación cancelada exitosamente.');
    }

    public function userReservations()
    {
        // Implementar lógica para mostrar las reservaciones del usuario
    }

    public function create()
    {
        // Implementar lógica para mostrar el formulario de creación de reservaciones
    }

    public function showTermsAndConditions()
    {
        $termsAndConditions = TermsAndConditions::first();
    
        // Pasar los términos y condiciones a la vista
        return view('termsAndConditions', compact('termsAndConditions'));
    }
    
    


}