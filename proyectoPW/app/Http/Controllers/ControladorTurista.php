<?php
namespace App\Http\Controllers;

use App\Http\Requests\validadorBuscarHotel;
use App\Http\Requests\validadorBuscarVuelo;
use App\Http\Requests\validadorConsultarReserva;
use App\Http\Requests\validarReserva;

use Illuminate\Http\Request;
use Validator;

class ControladorTurista extends Controller
{
    public function inicio()
    {
        return view('inicio'); 
    }
    public function buscarVuelo(validadorBuscarVuelo $request)
    {
        $vueloDisponible = true;
    
        if ($vueloDisponible) {
            return redirect()->back()->with('success_vuelo', 'Vuelo encontrado satisfactoriamente.');
        } else {
            return redirect()->back()->withErrors(['error_vuelo' => 'No se encontraron vuelos disponibles.']);
        }
    }
    
    public function buscarHotel(Request $request)
    {
        $validator = Validator::make($request->all(), (new validadorBuscarHotel)->rules());
        if ($validator->fails()) {
            session()->flash('errors_hotel', $validator->errors());
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('success_hotel', 'Hotel encontrado satisfactoriamente.');
    }
    
    public function consultarReserva(Request $request)
    {
        $validator = Validator::make($request->all(), (new validadorConsultarReserva)->rules());
        if ($validator->fails()) {
            session()->flash('errors_reserva', $validator->errors());
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('success_reserva', 'Reserva encontrada exitosamente.');
    }
    
    public function procesarLogin(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contraseña' => 'required|string|min:6',
        ]);

        return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso');
    }

    public function procesarRegistro(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
            'email' => 'required|email',
            'usuario' => 'required|string',
            'contraseña' => 'required|string|min:6',
        ]);

        return redirect()->route('inicio')->with('success', 'Registro exitoso');
    }

    public function reservarServicio(Request $request)
    {
        $total = ($request->vuelo_precio * $request->num_pasajeros) + ($request->hotel_precio * $request->num_noches);
        return back()->with('success', "Reservación realizada con éxito. ");
    }
}
