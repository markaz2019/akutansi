<?php

namespace App\Exports;

use App\Kisel_Baru;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport1 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kisel_Baru::all();
    }
}
