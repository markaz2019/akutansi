@extends('master')

@section('konten')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Laporan Nirwana (Dari Oto)</h1>
  <p class="mb-4">System Management MARKAZ</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <br>
    <form action="/cari_nirwana_oto" method="POST">
      @csrf
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <input type="text" name="from" placeholder="Mulai" onfocus="(this.type='date')">
          <input type="text" name="to" placeholder="Sampai" onfocus="(this.type='date')">
          <input class="btn btn-primary" type="submit" value="Cari">
        </div>
        <div class="col-1"></div>
        <div class="col-1">
          <a href="/cari_nirwana_oto/export_excel" class="btn btn-primary">Export Excel</a>
        </div>
        <div class="col-1">
          <button class="btn btn-primary" onclick="printContent('div1')">Print</button>
        </div>
      </div>
    </form>
    <hr>
    <div class="card-body">
      <div class="table-responsive" id="div1">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Keterangan</th>
              <th>5K</th>
              <th>10K</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sales as $value)
            <tr>
              <td>{{$value->ket}}</td>
              <td>@currency($value->lima)</td>
              <td>@currency($value->sepuluh)</td>
              <td>{{$value->tanggal}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection