<?php

namespace App\Exports;

use App\Hitung_Nirwana;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport4 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Hitung_Nirwana::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport4, 'ReportNirwana.xlsx');
    }
}
