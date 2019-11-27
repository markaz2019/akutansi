<?php

namespace App\Exports;

use App\Mlink;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport5 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mlink::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport5, 'ReportMlink.xlsx');
    }
}
