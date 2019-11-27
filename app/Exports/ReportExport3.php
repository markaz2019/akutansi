<?php

namespace App\Exports;

use App\Nirwana_Oto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport3 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Nirwana_Oto::all();
    }
}
