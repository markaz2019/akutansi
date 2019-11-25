<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nirwana_Oto;

class NirwanaOtoController extends Controller
{
    public function index()
    {
        $report = Nirwana_Oto::all();
        $jml_5 = $report[0]->lima - $report[1]->lima;
        $jml_10 = $report[0]->sepuluh - $report[1]->sepuluh;
        return view('nirwana_oto', compact('report','jml_5','jml_10'));
        
    }
    public function cari(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $title = "Sales From: " . $from . " To: " . $to;
        $sales = Nirwana_Oto::whereBetween('tanggal', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        return view('/cari_nirwana_oto', ['sales' => $sales]);
    }
}
