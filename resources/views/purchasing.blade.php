@extends('layouts.default')
@section('content')
<div class="container-fluid">
  <h2>Transaksi Pembelian</h2>
  <div class="row">
    <div class="col-md-6">
      <p>Tanggal: {{ date("d-M-Y") }}</p>
      <p>Supplier</p>
      <p>Mode pembelian</p>
      <p>Kode barang</p>
      <p>Nama barang</p>
      <p>Harga</p>
      <p>Jumlah barang</p>
      <p>Satuan</p>
      <p>Total</p>
    </div>
    <div class="col-md-6">
      <p>Daftar barang</p>
      <p>Total barang</p>
      <p>Total harga</p>
    </div>
  </div>
</div>
@endsection