<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;

class VueloController extends Controller
{
    public function buscarVuelo(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'fecha_salida' => 'required|date',
            'fecha_regreso' => 'nullable|date|after_or_equal:fecha_salida',
            'pasajeros' => 'required|integer|min:1',
        ]);

        
        // Obtener los datos del formulario
        $origen = $request->input('origen');
        $destino = $request->input('destino');
        $fecha_salida = $request->input('fecha_salida');
        $fecha_regreso = $request->input('fecha_regreso');
        $pasajeros = $request->input('pasajeros');

        // Realizar la consulta a la base de datos para obtener los vuelos
        $vuelos = Vuelo::where('origen', $origen)
            ->where('destino', $destino)
            ->whereDate('fecha_salida', $fecha_salida)
            ->when($fecha_regreso, function ($query) use ($fecha_regreso) {
                return $query->whereDate('fecha_llegada', $fecha_regreso);
            })
            ->get();


        // Si no se encuentran vuelos, mostrar mensaje
        if ($vuelos->isEmpty()) {
            return redirect()->back()->with('error_vuelo', 'No se encontraron vuelos para los parámetros seleccionados.');
        }

        // Pasar los resultados a la vista 'ResultadosVuelos'
        return view('ResultadosVuelos', compact('vuelos', 'origen', 'destino', 'fecha_salida', 'fecha_regreso', 'pasajeros'));
    }

}
