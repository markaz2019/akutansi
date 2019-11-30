@extends('master')

@section('konten')

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Laporan TELKOMSEL</h1>
  <p class="mb-4">System Management MARKAZ</p>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <br>
    <form action="/cari" method="POST">
      @csrf
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <input class="form_date" type="text" name="from" placeholder="Mulai" onfocus="(this.type='date')">
          <input class="form_date" type="text" name="to" placeholder="Sampai" onfocus="(this.type='date')">
          <div class="buttons" value="Cari">
            <button class="blob-btn">
              <span class="blob-btn__inner">
                <span class="blob-btn__blobs">
                  <span class="blob-btn__blob"></span>
                  <span class="blob-btn__blob"></span>
                  <span class="blob-btn__blob"></span>
                  <span class="blob-btn__blob"></span>
                </span>
              </span>
            </button>
          </div>
    </form>
    <style>
      .form_date {
        width: 32% !important;
        height: 26% !important;
        border: 1px solid #cccccc !important;
        border-radius: 11px !important;
        text-align: center !important;
      }
    </style>
    <!-- /.container-fluid -->
    @endsection