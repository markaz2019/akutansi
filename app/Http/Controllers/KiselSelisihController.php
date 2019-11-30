<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kisel_Selisih;
use App\Exports\ReportExport2;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KiselSelisihController extends Controller
{
    public function index()
    {
        $kisel = Kisel_Selisih::all();
        $jml_10 = $kisel[0]->sepuluh - $kisel[1]->sepuluh;
        $jml_15 = $kisel[0]->lima_belas - $kisel[1]->lima_belas;
        $jml_25 = $kisel[0]->dua_lima - $kisel[1]->dua_lima;
        $jml_30 = $kisel[0]->tiga_puluh - $kisel[1]->tiga_puluh;
        $jml_40 = $kisel[0]->empat_puluh - $kisel[1]->empat_puluh;
        $jml_50 = $kisel[0]->lima_puluh - $kisel[1]->lima_puluh;
        $jml_75 = $kisel[0]->tujuh_lima - $kisel[1]->tujuh_lima;
        $jml_100 = $kisel[0]->seratus - $kisel[1]->seratus;
        $jml_150 = $kisel[0]->seratus_lima - $kisel[1]->seratus_lima;
        $jml_200 = $kisel[0]->dua_ratus - $kisel[1]->dua_ratus;
        $jml_300 = $kisel[0]->tiga_ratus - $kisel[1]->tiga_ratus;
        $jml_400 = $kisel[0]->empat_ratus - $kisel[1]->empat_ratus;
        $jml_500 = $kisel[0]->lima_ratus - $kisel[1]->lima_ratus;
        $jml_1000 = $kisel[0]->satu_juta - $kisel[1]->satu_juta;


        return view('kisel_selisih', compact('kisel', 'jml_15', 'jml_25', 'jml_10', 'jml_30', 'jml_40', 'jml_50', 'jml_75', 'jml_100', 'jml_150', 'jml_200', 'jml_300', 'jml_500', 'jml_1000'));
    }

    public function cari(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $title = "Sales From: " . $from . " To: " . $to;
        $sales = Kisel_Selisih::whereBetween('tanggal', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        // dd($sales);
        // dd($sales);
        // $stock_awal_15 = $sales[0]->lima_belas;
        // $deposit_15 = $sales[1]->lima_belas;
        // $penjumlahan_15 = $sales[2]->lima_belas;
        // $jml_15 = $stock_awal_15 - $deposit_15 + $penjumlahan_15;
        // dd($jml_15);
        return view('/cari_kisel_selisih', compact('sales'));
    }
    public function export_excel()
    {
        return Excel::download(new ReportExport2, 'ReportKiselSelisih.xlsx');
    }
}
