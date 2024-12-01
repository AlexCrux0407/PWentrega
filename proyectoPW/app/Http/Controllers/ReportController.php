<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use App\Models\Hotel;
use PDF;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // Generar reporte en PDF
    public function vuelosPdf()
    {
        $vuelos = Vuelo::all();

        $pdf = DomPdf::loadView('reports.vuelos-pdf', compact('vuelos'));
        return $pdf->download('reporte_vuelos.pdf');
    }

    public function hotelesPdf()
    {
        $hoteles = Hotel::all();

        $pdf = DomPdf::loadView('reports.hoteles-pdf', compact('hoteles'));
        return $pdf->download('reporte_hoteles.pdf');
    }

    // Generar reporte en Excel
    public function vuelosExcel()
    {
        return Excel::download(new \App\Exports\VuelosExport, 'reporte_vuelos.xlsx');
    }

    public function hotelesExcel()
    {
        return Excel::download(new \App\Exports\HotelesExport, 'reporte_hoteles.xlsx');
    }
}
