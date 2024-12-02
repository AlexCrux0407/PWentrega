<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function buscarHotel(Request $request)
    {
        $request->validate([
            'ciudad' => 'required|string|max:255', // obligatoria
            'categoria' => 'nullable|integer|min:1|max:5', // Opcional
            'precio' => 'nullable|integer|min:1|max:4', // Opcional
            'distancia' => 'nullable|integer|min:1|max:4', // Opcional
            'servicios' => 'nullable|string|max:255', // Opcional
        ]);

        $query = Hotel::where('ciudad', $request->ciudad);

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

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

        if ($request->filled('servicios')) {
            $query->where('servicios', 'LIKE', '%' . $request->servicios . '%');
        }

        $hoteles = $query->get();

        return view('ResultadosHoteles', compact('hoteles'));
    }

}
