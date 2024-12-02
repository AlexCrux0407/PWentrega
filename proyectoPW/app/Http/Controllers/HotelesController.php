<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function buscarHotel(Request $request)
    {
        // Iniciamos la consulta en el modelo Hotel
        $query = Hotel::query();

        // Filtramos por categoría (estrellas)
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Filtramos por precio
        if ($request->filled('precio')) {
            if ($request->precio == 1) {
                $query->where('precio_por_noche', '<', 100);
            } elseif ($request->precio == 2) {
                $query->whereBetween('precio_por_noche', [100, 300]);
            } elseif ($request->precio == 3) {
                $query->whereBetween('precio_por_noche', [300, 500]);
            } elseif ($request->precio == 4) {
                $query->where('precio_por_noche', '>', 500);
            }
        }

        // Filtramos por distancia al centro
        if ($request->filled('distancia')) {
            if ($request->distancia == 1) {
                $query->where('distancia', '<', 1);
            } elseif ($request->distancia == 2) {
                $query->whereBetween('distancia', [1, 5]);
            } elseif ($request->distancia == 3) {
                $query->whereBetween('distancia', [5, 10]);
            } elseif ($request->distancia == 4) {
                $query->where('distancia', '>', 10);
            }
        }

        // Filtramos por servicios (si está disponible)
        if ($request->filled('servicios')) {
            $query->where('servicios', 'LIKE', '%' . $request->servicios . '%');
        }

        // Ejecutamos la consulta y obtenemos los resultados
        $hoteles = $query->get();

        // Retornamos los resultados a la vista 'ResultadosHoteles'
        return view('ResultadosHoteles', compact('hoteles'));
    }
}
