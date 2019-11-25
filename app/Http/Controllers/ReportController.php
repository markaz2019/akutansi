<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Report;
use PDF;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {

        $report = Report::join('tsel', 'data.modul_id', '=', 'tsel.modul_id')
            ->select('tsel.modul as modul', 'data.nomor as nomor', 'data.modul_id as modul_id', 'data.jml_trx as jml_trx', 'data.spl as spl', 'data.saldo_awal as saldo_awal', 'data.deposit as deposit', 'data.pemakaian as pemakaian', 'data.saldo_akhir_cs as saldo_akhir_cs', 'data.jenis as jenis', 'data.tanggal as tanggal')
            ->get();
        // dd($report);


        foreach ($report as $key => $value) {
            $array_jml_trx[] = $value->jml_trx;
            $array_spl[] = $value->spl;
            $array_saldo_awal[] = $value->saldo_awal;
            $array_selisih_trx[] = $value->jml_trx + $value->spl;
            $array_saldo_awal[] = $value->saldo_awal;
            $array_deposit[] = $value->deposit;
            $array_pemakaian[] = $value->pemakaian;
            $array_saldo_akhir_cs[] = $value->saldo_akhir_cs;
            $array_selisih_akhir[] = $value->saldo_akhir_cs + $value->pemakaian - $value->deposit - $value->saldo_awal;
        }
        $sum_jml_trx = array_sum($array_jml_trx);
        $sum_spl = array_sum($array_spl);
        $sum_saldo_awal = array_sum($array_saldo_awal);
        $sum_selisih_trx = array_sum($array_selisih_trx);
        $sum_saldo_awal = array_sum($array_saldo_awal);
        $sum_deposit = array_sum($array_deposit);
        $sum_pemakaian = array_sum($array_pemakaian);
        $sum_saldo_akhir_cs = array_sum($array_saldo_akhir_cs);
        $sum_selisih_akhir = array_sum($array_selisih_akhir);
        return view('report', compact('report', 'sum_jml_trx', 'sum_spl', 'sum_saldo_awal', 'sum_selisih_trx', 'sum_saldo_awal', 'sum_deposit', 'sum_pemakaian', 'sum_saldo_akhir_cs', 'sum_selisih_akhir'));
    }
    public function cari(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $title = "Sales From: " . $from . " To: " . $to;
        $sales = Report::whereBetween('tanggal', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        return view('/cari', ['sales' => $sales]);
    }

    public function export_excel()
    {
        return Excel::download(new ReportExport, 'ReportSPL.xlsx');
    }
}
