<?php

namespace App\Exports;

use App\Models\Hotel;
use Maatwebsite\Excel\Concerns\FromCollection;

class HotelesExport implements FromCollection
{
    public function collection()
    {
        return Hotel::all();
    }
}
