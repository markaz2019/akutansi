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
          <input class="form_date" type="text" name="from" placeholder="Mulai" onfocus="(this.type='date')">
          <input class="form_date" type="text" name="to" placeholder="Sampai" onfocus="(this.type='date')">
          <input class="btn btn-primary" type="submit" value="Cari">
        </div>
      </div>
    </form>
    <br /><br />

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