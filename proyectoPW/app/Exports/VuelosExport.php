<?php

namespace App\Exports;

use App\Models\Vuelo;
use Maatwebsite\Excel\Concerns\FromCollection;

class VuelosExport implements FromCollection
{
    public function collection()
    {
        return Vuelo::all();
    }
}
