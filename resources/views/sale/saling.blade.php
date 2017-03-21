@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div id="table" class="table-responsive">
      <table class="table">
        <thead>
          <tr class="center">
            <th style="width:45px">#</th>
            <th>Nama Barang</th>
            <th style="width:100px">Harga</th>
            <th style="width:65px">Qty</th>
            <th style="width:150px">Total</th>
          </tr>
        </thead>
        <tbody>
         {{--  @foreach($datadetail->purchasedetails as $detail)
          <tr>
            <td>!</td>
            <td>{{$detail->product->name}}</td>
            <td>{{$detail->product_id}}</td>
            <td>{{$detail->quantity}}</td>
            <td>total</td>
          </tr>
          @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-right">Total: {{ $datadetail->total }}</h2>
        <h3 class="">No : {{ $datadetail->sale_number }}</h3>
        <p>Supplier : {{ $datadetail->customer->name }}</p>
        <p>Type : {{ $datadetail->type }}</p>
        <p>Tanggal : {{ $datadetail->created_at }}</p>
        <p>Catatan : {{ $datadetail->note }}</p>
      </div>
      <div class="col-md-12"><div class="divider"></div></div>
      <div class="col-md-12">
        <div class="input-group">
          <input
          id="purchaseBarcode" 
          type="text" 
          class="form-control select2" 
          name="name" 
          placeholder="Barcode"
          aria-describedby="basic-addon1">
          <span class="input-group-btn">
            <button id="tambahProduct" class="btn btn-default" type="button" disabled="disabled">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
          </span>
        </div>
      </div>
      <div class="col-md-4" style="padding-top: 10px;">
        {{-- <div class="input-group"> --}}
        <input name="quantity" type="text" class="form-control" id="qty" placeholder="Quantity">
        {{-- </div> --}}
      </div>
      <div class="col-md-4" style="padding-top: 10px;">
        <button id="cariBarang" class="btn btn-default btn-block">CARI</button>
      </div>
      <div class="col-md-4" style="padding-top: 10px;">
        <button id="simpanPembelian" class="btn btn-default btn-block">SIMPAN</button>
      </div>
    </div>
    <div class="well" style="margin-top: 20px;">
      * Barang akan otomatis bertambah jika klik "simpan"
    </div>
  </div>
</div>

<script>
  $('#purchaseBarcode').keypress(function(event){
    // var supplier = $('#supplierId option:selected').val();
    // var type = $('#tipepembelian option:selected').val();
    // var barcode = $(this).val();  

    if (event.which == 13) {
      event.preventDefault();
      alert();
    }
  });

  $('#tambahProduct').click(function(){
    var _url = '{{url("product/create")}}';
    var barcode = $('#purchaseBarcode').val();
    showModalPage(_url,barcode,'Tambah Barang');
  });
</script>
@endsection