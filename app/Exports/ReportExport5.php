<?php

namespace App\Exports;

<<<<<<< HEAD
use App\mlink;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport1 implements FromCollection
=======
use App\Mlink;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport5 implements FromCollection
>>>>>>> 8125ed69c49f2cf4684be7aaecf2c75e9f233a7b
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
<<<<<<< HEAD
        return mlink::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport5, 'Laporan.xlsx');
=======
        return Mlink::all();
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport5, 'ReportMlink.xlsx');
>>>>>>> 8125ed69c49f2cf4684be7aaecf2c75e9f233a7b
    }
}
