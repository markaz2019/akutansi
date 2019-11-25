<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kisel_Baru;
use App\Exports\ReportExport1;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KiselBaruController extends Controller
{
    public function index()
    {
        $kisel = Kisel_Baru::all();
        $stock_awal_10 = $kisel[0]->sepuluh;
        $deposit_10 = $kisel[1]->sepuluh;
        $penjumlahan_10 = $kisel[2]->sepuluh;
        $jml_10 = $stock_awal_10 - $deposit_10 + $penjumlahan_10;

        $stock_awal_15 = $kisel[0]->lima_belas;
        $deposit_15 = $kisel[1]->lima_belas;
        $penjumlahan_15 = $kisel[2]->lima_belas;
        $jml_15 = $stock_awal_15 - $deposit_15 + $penjumlahan_15;

        $stock_awal_25 = $kisel[0]->dua_lima;
        $deposit_25 = $kisel[1]->dua_lima;
        $penjumlahan_25 = $kisel[2]->dua_lima;
        $jml_25 = $stock_awal_25 - $deposit_25 + $penjumlahan_25;

        $stock_awal_30 = $kisel[0]->tiga_puluh;
        $deposit_30 = $kisel[1]->tiga_puluh;
        $penjumlahan_30 = $kisel[2]->tiga_puluh;
        $jml_30 = $stock_awal_30 - $deposit_30 + $penjumlahan_30;

        $stock_awal_40 = $kisel[0]->empat_puluh;
        $deposit_40 = $kisel[1]->empat_puluh;
        $penjumlahan_40 = $kisel[2]->empat_puluh;
        $jml_40 = $stock_awal_40 - $deposit_40 + $penjumlahan_40;

        $stock_awal_50 = $kisel[0]->lima_puluh;
        $deposit_50 = $kisel[1]->lima_puluh;
        $penjumlahan_50 = $kisel[2]->lima_puluh;
        $jml_50 = $stock_awal_50 - $deposit_50 + $penjumlahan_50;

        $stock_awal_75 = $kisel[0]->tujuh_lima;
        $deposit_75 = $kisel[1]->tujuh_lima;
        $penjumlahan_75 = $kisel[2]->tujuh_lima;
        $jml_75 = $stock_awal_75 - $deposit_75 + $penjumlahan_75;

        $stock_awal_100 = $kisel[0]->seratus;
        $deposit_100 = $kisel[1]->seratus;
        $penjumlahan_100 = $kisel[2]->seratus;
        $jml_100 = $stock_awal_100 - $deposit_100 + $penjumlahan_100;

        $stock_awal_150 = $kisel[0]->seratus_lima;
        $deposit_150 = $kisel[1]->seratus_lima;
        $penjumlahan_150 = $kisel[2]->seratus_lima;
        $jml_150 = $stock_awal_150 - $deposit_150 + $penjumlahan_150;

        $stock_awal_200 = $kisel[0]->dua_ratus;
        $deposit_200 = $kisel[1]->dua_ratus;
        $penjumlahan_200 = $kisel[2]->dua_ratus;
        $jml_200 = $stock_awal_200 - $deposit_200 + $penjumlahan_200;

        $stock_awal_300 = $kisel[0]->tiga_ratus;
        $deposit_300 = $kisel[1]->tiga_ratus;
        $penjumlahan_300 = $kisel[2]->tiga_ratus;
        $jml_300 = $stock_awal_300 - $deposit_300 + $penjumlahan_300;

        $stock_awal_500 = $kisel[0]->lima_ratus;
        $deposit_500 = $kisel[1]->lima_ratus;
        $penjumlahan_500 = $kisel[2]->lima_ratus;
        $jml_500 = $stock_awal_500 - $deposit_500 + $penjumlahan_500;

        $stock_awal_1000 = $kisel[0]->satu_juta;
        $deposit_1000 = $kisel[1]->satu_juta;
        $penjumlahan_1000 = $kisel[2]->satu_juta;
        $jml_1000 = $stock_awal_1000 - $deposit_1000 + $penjumlahan_1000;

        // dd($jml_15);
        return view('kisel_baru', compact('kisel', 'jml_15', 'jml_25', 'jml_10', 'jml_30', 'jml_40', 'jml_50', 'jml_75', 'jml_100', 'jml_150', 'jml_200', 'jml_300', 'jml_500', 'jml_1000'));
    }

    public function cari(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $title = "Sales From: " . $from . " To: " . $to;
        $sales = Kisel_Baru::whereBetween('tanggal', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        // dd($sales);
        // dd($sales);
        // $stock_awal_15 = $sales[0]->lima_belas;
        // $deposit_15 = $sales[1]->lima_belas;
        // $penjumlahan_15 = $sales[2]->lima_belas;
        // $jml_15 = $stock_awal_15 - $deposit_15 + $penjumlahan_15;
        // dd($jml_15);
        return view('/cari_kisel', compact('sales'));
    }

    public function export_excel()
    {
        return Excel::download(new ReportExport1, 'ReportKiselBaru.xlsx');
    }
}
