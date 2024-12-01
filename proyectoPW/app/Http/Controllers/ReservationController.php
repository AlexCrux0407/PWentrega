<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Vuelo;
use Carbon\Carbon;

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
        // Depurar contenido de la sesión
        dd(session('reservations'));

        $reservation = session('reservations');

        if (!$reservation) {
            return redirect()->route('reservations.create')->withErrors('No hay reservaciones para mostrar.');
        }

        return view('reservations.reservacion', compact('reservation'));
    }


    public function userReservations()
    {
        $userReservations = Auth::user()->reservations;
        return view('reservations.user', compact('userReservations'));
    }

    public function create()
    {
        $hoteles = Hotel::all(); 
        $vuelos = Vuelo::all();  
        return view('reservations.create', compact('hoteles', 'vuelos'));
    }
    

    public function cancelReservation($id)
    {
        $reservation = Reservation::find($id);
        $currentDate = Carbon::now();
        $reservationDate = Carbon::parse($reservation->created_at);

        // Verificar si está dentro de las 48 horas
        if ($currentDate->diffInHours($reservationDate) <= 48) {
            // Cancelación sin cargos adicionales
            $reservation->delete();
            return redirect()->route('reservations.user')->with('success', 'Reservación cancelada sin cargos adicionales.');
        } else {
            // Aplicar cargos por cancelación
            $cancellationFee = $reservation->total * 0.5; // 50% de cargos por cancelación
            $user = Auth::user();
            $reservation->delete();
            return redirect()->route('reservations.user')->with('success', 'Reservación cancelada con un cargo del 50%.');
        }
    }
}
