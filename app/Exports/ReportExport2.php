<?php

namespace App\Exports;

use App\Kisel_Selisih;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport2 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kisel_Selisih::all();
    }
}
