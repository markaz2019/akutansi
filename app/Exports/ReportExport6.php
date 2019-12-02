<?php

namespace App\Exports;

use App\Cari_Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport6 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cari_Laporan::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport6, 'ReportMlink.xlsx');
    }
}
