<?php

namespace App\Exports;

use App\mlink;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport1 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return mlink::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport5, 'Laporan.xlsx');
    }
}
