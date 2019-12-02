@extends('master')

@section('konten')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan TELKOMSEL</h1>
    <p class="mb-4">System Management MARKAZ</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <br>
        <form action="/cari_laporan" method="POST">
            @csrf
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <input class="form_date" type="text" name="from" placeholder="Mulai" onfocus="(this.type='date')">
                    <input class="form_date" type="text" name="to" placeholder="Sampai" onfocus="(this.type='date')">
                    <input class="btn btn-primary" type="submit" value="Cari">
                </div>
                <div class="col-1">
                    <a href="/cari_laporan/export_excel" class="btn btn-primary">EXCEL</a>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary" onclick="printContent('div1')">PDF</button>
                </div>
                <div class="col-1"></div>
            </div>
        </form>
        <hr>
        <div class="card-body">
            <br />

            <h3 align="center"> LAPORAN TELKOMSEL </h3>
            <br />
            <h4 align="center">STATUS PENJUALAN MODUL H2H ALL SERVER</h4>

            <br />
            <div class="table-responsive" id="div1">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Modul</th>
                            <th>Jml Trx</th>
                            <th>SPL</th>
                            <th>Selisih Trx</th>
                            <th>Saldo Awal</th>
                            <th>Deposit</th>
                            <th>Pemakaian </th>
                            <th>Saldo Akhir CS</th>
                            <th>Selisih Akhir</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td>{{$value->nomor}}</td>
                            <td>{{$value->modul}}</td>
                            <td>@currency($value->jml_trx)</td>
                            <td>@currency($value->spl)</td>
                            <td>@currency($value->jml_trx + $value->spl)</td>
                            <td>@currency($value->saldo_awal)</td>
                            <td>@currency($value->deposit)</td>
                            <td>@currency($value->pemakaian)</td>
                            <td>@currency($value->saldo_akhir_cs)</td>
                            <td>@currency($value->saldo_akhir_cs + $value->pemakaian - $value->deposit - $value->saldo_awal)</td>
                            <td>{{$value->jenis}}</td>
                            <td>{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br /><br />
                <h3 align="center"> LAPORAN MLINK </h3>
                <br />
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Modul</th>
                            <th>Jml Trx</th>
                            <th>SPL</th>
                            <th>Selisih Trx</th>
                            <th>Saldo Awal</th>
                            <th>Deposit</th>
                            <th>Pemakaian </th>
                            <th>Saldo Akhir CS</th>
                            <th>Selisih Akhir</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td>{{$value->nomor}}</td>
                            <td>{{$value->modul}}</td>
                            <td>@currency($value->jml_trx)</td>
                            <td>@currency($value->spl)</td>
                            <td>@currency($value->jml_trx + $value->spl)</td>
                            <td>@currency($value->saldo_awal)</td>
                            <td>@currency($value->deposit)</td>
                            <td>@currency($value->pemakaian)</td>
                            <td>@currency($value->saldo_akhir_cs)</td>
                            <td>@currency($value->saldo_akhir_cs + $value->pemakaian - $value->deposit - $value->saldo_awal)</td>
                            <td>{{$value->jenis}}</td>
                            <td>{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br /><br />
                <h3 align="center"> LAPORAN KISEL </h3>
                <br />

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>10K</th>
                            <th>15K</th>
                            <th>25K</th>
                            <th>30K</th>
                            <th>40K</th>
                            <th>50K</th>
                            <th>75K</th>
                            <th>100K</th>
                            <th>150K</th>
                            <th>200K</th>
                            <th>300K</th>
                            <th>500K</th>
                            <th>1000K</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td>{{$value->ket}}</td>
                            <td>@currency($value->sepuluh)</td>
                            <td>@currency($value->lima_belas)</td>
                            <td>@currency($value->dua_lima)</td>
                            <td>@currency($value->tiga_puluh)</td>
                            <td>@currency($value->empat_puluh)</td>
                            <td>@currency($value->lima_puluh)</td>
                            <td>@currency($value->tujuh_lima)</td>
                            <td>@currency($value->seratus)</td>
                            <td>@currency($value->seratus_lima)</td>
                            <td>@currency($value->dua_ratus)</td>
                            <td>@currency($value->tiga_ratus)</td>
                            <td>@currency($value->lima_ratus)</td>
                            <td>@currency($value->satu_juta)</td>
                            <td>{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br /><br />
                <h3 align="center">KISEL BARU (selisih ss CS dan hitungan)</h3>
                <br />
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>10K</th>
                            <th>15K</th>
                            <th>25K</th>
                            <th>30K</th>
                            <th>40K</th>
                            <th>50K</th>
                            <th>75K</th>
                            <th>100K</th>
                            <th>150K</th>
                            <th>200K</th>
                            <th>300K</th>
                            <th>500K</th>
                            <th>1000K</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td>{{$value->ket}}</td>
                            <td>@currency($value->sepuluh)</td>
                            <td>@currency($value->lima_belas)</td>
                            <td>@currency($value->dua_lima)</td>
                            <td>@currency($value->tiga_puluh)</td>
                            <td>@currency($value->empat_puluh)</td>
                            <td>@currency($value->lima_puluh)</td>
                            <td>@currency($value->tujuh_lima)</td>
                            <td>@currency($value->seratus)</td>
                            <td>@currency($value->seratus_lima)</td>
                            <td>@currency($value->dua_ratus)</td>
                            <td>@currency($value->tiga_ratus)</td>
                            <td>@currency($value->lima_ratus)</td>
                            <td>@currency($value->satu_juta)</td>
                            <td>{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br /><br />

                <h3 align="center">HITUNGAN NIRWANA</h3>
                <br />
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">Keterangan</th>
                            <th width="30%">5K</th>
                            <th width="50%">10K</th>
                            <th width="20%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td scope="col">{{$value->ket}}</td>
                            <td scope="col">@currency($value->lima)</td>
                            <td scope="col">@currency($value->sepuluh)</td>
                            <td scope="col">{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br /><br />
                <h3 align="center">NIRWANA OTO</h3>
                <br />
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">Keterangan</th>
                            <th width="30%">5K</th>
                            <th width="50%">10K</th>
                            <th width="20%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $value)
                        <tr>
                            <td>{{$value->ket}}</td>
                            <td>@currency($value->lima)</td>
                            <td>@currency($value->sepuluh)</td>
                            <td>{{$value->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br />
            </div>
        </div>
    </div>
    <style>
        .form_date {
            width: 32% !important;
            height: 100% !important;
            border: 1px solid #cccccc !important;
            border-radius: 11px !important;
            text-align: center !important;
        }
    </style>
    <!-- /.container-fluid -->
    @endsection