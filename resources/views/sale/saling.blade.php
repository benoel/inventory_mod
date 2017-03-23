@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div id="tableSale" class="table-responsive">
      <table class="table table-hover">
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
          @php ($i = 0)
          @foreach($datasaledetail as $detail)
          @php ($i++)
          <tr
          class="productitem"
          data-product="{{$detail->product_id}}"
          data-barcode ="{{$detail->product->barcode}}">
          <td name="no">{{$i}}</td>
          <td name="pro">{{$detail->product->name}}</td>
          <td name="pri">{{number_format($detail->price)}}</td>
          <td name="qty">{{$detail->quantity}}</td>
          <td name="tot" data-value="{{$detail->total}}">{{number_format($detail->total)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-right" id="grandTotal">Total: {{ $datadetail->total }}</h2>
      <h3 class="">No : {{ $datadetail->sale_number }}</h3>
      <p>Supplier : {{ $datadetail->customer->name }}</p>
      <p>Type : {{ $datadetail->type }}</p>
      <p>Tanggal : {{ $datadetail->created_at }}</p>
      <p>Status : {{ $datadetail->status }}</p>
      <p>Catatan : {{ $datadetail->note }}</p>
    </div>
    <div class="col-md-12"><div class="divider"></div></div>
    <div class="col-md-12">
        {{-- <div class="input-group">
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
        </div> --}}
        <div class="input-group">
          <span class="input-group-btn">
            <button id="tambahProduct" class="btn btn-default" type="button" disabled="disabled">+
            </button>
            {{-- <button id="tambahHarga" class="btn btn-default" type="button" disabled="disabled">Rp
          </button> --}}
        </span>
        <input id="saleBarcode" type="text" class="form-control select2" name="name" placeholder="Barcode" aria-describedby="basic-addon1" data-id="" data-name="" {{$dtstatus}} autofocus>
      </div>
    </div>
    <div class="col-md-4" style="padding-top: 30px;">
      <input name="quantity" type="text" class="form-control" {{$dtstatus}} id="qty" placeholder="Quantity">
      {{-- </div> --}}
    </div>
    <div class="col-md-4" style="padding-top: 30px;">
      <button id="hapusItem" class="btn btn-danger btn-block" {{$dtstatus}}>
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> HAPUS
      </button>
    </div>
    <div class="col-md-4" style="padding-top: 30px;">
     <button id="simpanPembelian" class="btn btn-success btn-block" {{$dtstatus}}>
      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SELESAI
    </button>
  </div>
</div>
<div class="well" style="margin-top: 20px;">
  * Barang akan otomatis berkurang jika klik "simpan"
</div>
</div>
</div>

<script>

  $(document).ready(function(){
    grandTotal()
  });

  $('#tableSale tbody').on("click","tr",function(e){

    var status = '{{$dtstatus}}';
    if (status != 'disabled') {
      $('#saleBarcode').val($(this).attr("data-barcode"));
      $('#saleBarcode').attr('data-id', $(this).attr("data-product"));
      $('#saleBarcode').attr('data-name', $(this).find("td[name='no']").text());
      $('#qty').focus();
    }else{
      showModalInfo('Penjualan Ini Sudah Selesai!!')
    }

  });

  $('#saleBarcode').keypress(function(event){
    var barcode = $(this).val();

    if (event.which == 13) {
      event.preventDefault();
      checkProduct(barcode).done(function(result){
        if (result == 'noproduct') {
          showModalInfo('Data barang tidak ditemukan, silahkan tambah data.');
          $('#tambahProduct').prop('disabled',false);
        }
      });
    }
  });

  $('#tambahProduct').click(function(e){
    e.preventDefault();
    barang = {
      snumber: '{{$datadetail->sale_number}}',
      barcode: $('#saleBarcode').val(),
      url: '/tambahbarang',
      title: 'Tambah Barang'
    }
    showModalFormTambahBarang(barang);
  });

  function checkProduct(barcode){
    return $.ajax({
     type: 'GET',
     url: '{{ url('checkproduct') }}' + '/' + barcode 
   })
  }

  $('#qty').keypress(function(e){
    var sale_number = '{{$datadetail->sale_number}}';
    var barcode = $('#saleBarcode').val();
    {{-- var supplier = '{{$datadetail->supplier_id}}'; --}}
    {{-- var type = '{{$datadetail->type}}'; --}}
    var _qty = $(this).val();

    if (e.which == 13) {
      e.preventDefault();
      checkProduct(barcode)
      .done(function(result){
        var _tr = 'tr[data-product="'+result.productid+'"]';
        var _pri = result.price * _qty;
        var sdEdit = {
          salNumber: sale_number,
          proId: result.productid,
          quantity: _qty,
          price: result.price,
          total: _pri,
          _token: "{{csrf_token()}}"
        };
        
        editSaleDetail(sdEdit)
        .done(function(result){
          console.log(result);
          $(_tr).find('td[name="qty"]').text(_qty);
          $(_tr).find('td[name="tot"]').attr("data-value",_pri);
          $(_tr).find('td[name="tot"]').text(_pri.toString().replace(/\B(?=(\d{3})+\b)/g, ","));
          grandTotal()
          $('#qty').val('');
          $('#saleBarcode').val('').focus();
        }).fail(function(result){});
      });
    }
  });

  $('#hapusItem').click(function(e){
    var snumber = '{{$datadetail->sale_number}}';
    var productid = $('#saleBarcode').data('id');
    var _url = '/saledetail/'+snumber+'/'+productid+'/delete';

    $('#modalDelete').find('.btn-danger').attr('data-url',_url);
    $('#modalDelete').modal('show');
  });

  $('#simpanPembelian').click(function(){
    var ptable = $('#tableSale tbody tr');
    var dataSale = [];

    if(ptable.length != 0){
      ptable.each(function(){
        var purchaserow = {
          productid: $(this).data('product'),
          quantity: $(this).find('td[name="qty"]').text(),
          total: $(this).find('td[name="tot"]').data('value')
        }
        dataSale.push(purchaserow);
      });

      var insertSale = {
        _token:"{{csrf_token()}}",
        salNumber: '{{$datadetail->sale_number}}',
        rows: dataSale
      };
    }else{
      showModalInfo('Anda belum memasukkan barang!');
    }

    $.ajax({
      type: "post",
      url: '/saleclose',
      data: insertSale,
      success: function(result){
        location.href = '/sale';
      }
    });
  });


</script>
@endsection