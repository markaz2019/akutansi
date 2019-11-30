<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hitung_Nirwana;
use App\Exports\ReportExport4;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class HitungNirwanaController extends Controller
{
    public function index()
    {
        // $join = Hitung_Nirwana::join('nirwana_oto', 'hitungan_nirwana.id', '=', 'nirwana_oto.id_nirwana')
        //     ->select('hitungan_nirwana.ket as ket')
        //     ->get();
        // dd($join);
        $report = Hitung_Nirwana::all();
        // dd($report);
        $jml_5 = $report[0]->lima + $report[1]->lima - $report[2]->lima;
        $jml_10 = $report[0]->sepuluh + $report[1]->sepuluh - $report[2]->sepuluh;
        // dd($report);
        return view('hitung_nirwana', compact('report', 'jml_5', 'jml_10'));
    }
    public function cari(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $title = "Sales From: " . $from . " To: " . $to;
        $sales = Hitung_Nirwana::whereBetween('tanggal', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        return view('/cari_nirwana', ['sales' => $sales]);
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport4, 'ReportNirwana.xlsx');
    }
}
