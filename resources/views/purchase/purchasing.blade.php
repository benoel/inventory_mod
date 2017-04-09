@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div id="tablePurchase" class="table-responsive">
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
          @foreach($datadetail->purchasedetails as $detail)
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
<div style="background-color: #C9C9C9;" class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <h2 id="grandTotal" class="text-right"></h2>
      <div class="divider"></div>
      <h3 class="">No : {{ $datadetail->purchase_number }}</h3>
      <p>Supplier : {{ $datadetail->supplier->name }}</p>
      <p>Type : {{ $datadetail->type }}</p>
      <p>Tanggal : {{ $datadetail->created_at }}</p>
      <p>Status : {{ $datadetail->status }}</p>
      <p>Catatan : {{ $datadetail->note }}</p>
    </div>
    <div class="col-md-12"><div class="divider"></div></div>
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <button 
          id="tambahProduct" 
          class="btn btn-default" 
          type="button" 
          disabled="disabled">+
        </button>
        <button 
        id="tambahHarga" 
        class="btn btn-default" 
        type="button" 
        disabled="disabled">Rp
      </button>
    </span>
    <input
    id="purchaseBarcode" 
    type="text" 
    class="form-control select2" 
    name="name" 
    placeholder="Barcode"
    aria-describedby="basic-addon1"
    data-id=""
    data-name=""
    {{$dtstatus}}
    autofocus>
  </div>
</div>
<div class="col-md-4" style="padding-top: 30px;">
  <input name="quantity" type="text" class="form-control" id="qty" placeholder="Quantity" {{$dtstatus}}>
</div>
<div class="col-md-4" style="padding-top: 30px;">
  <button 
  id="hapusItem" 
  class="btn btn-danger btn-block"
  {{$dtstatus}}>
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> HAPUS
</button>
</div>
<div class="col-md-4" style="padding-top: 30px;">
  <button 
  id="simpanPembelian" 
  class="btn btn-success btn-block"
  {{$dtstatus}}>
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SELESAI
</button>
</div>
</div>
<div class="well" style="margin-top: 20px;">
  * Barang akan otomatis bertambah jika klik "simpan"
</div>
<div class="row">
  <div class="col-md-{{ $dtstatus =='disabled' ? '6' : '12'}} ">
    <a href="{{ url('purchases') }}" class="btn btn-default btn-block" style="margin-top: 15px; color: #636b6f; border-bottom: 5px solid #F4645F;">
     <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 
     KEMBALI
   </a>
 </div>
 <div class="{{ $dtstatus=='disabled' ? 'col-md-6' : 'hidden'}} ">
   <a href="#" id="print" class="btn btn-default btn-block" style="margin-top: 15px; color: #636b6f; border-bottom: 5px solid #5CB85C;">
     {{-- <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>  --}}
     PREVIEW DAN PRINT
   </a>
 </div>
</div>

<br>

</div>
</div>

<script>
  $(document).ready(function(){
    grandTotal();
    cek_fieldbarcode();
  });

  function cek_fieldbarcode(){
    var field = $('#purchaseBarcode').val();
    if (field != '') {
      $('#qty').attr('disabled', false);
      $('#hapusItem').attr('disabled', false);
    }else{
      $('#qty').attr('disabled', true);
      $('#hapusItem').attr('disabled', true);
    }
  }

  $('#tablePurchase tbody').on("click","tr",function(e){
    var status = '{{$dtstatus}}';
    if (status != 'disabled') {
      $('#purchaseBarcode').val($(this).data("barcode"))
      $('#purchaseBarcode').attr('data-id', $(this).data("product"));
      $('#purchaseBarcode').attr('data-name', $(this).find("td[name='no']").text());
      cek_fieldbarcode();
      $('#qty').focus();
      // cek_fieldbarcode();
    }else{
      showModalInfo('Penjualan Ini Sudah Selesai!!')
    }
  });

  $('#purchaseBarcode').keyup(function(event) {
    cek_fieldbarcode();
  });

  $('#purchaseBarcode').keypress(function(event){
    var purchase_number = '{{$datadetail->purchase_number}}';
    var supplier = '{{$datadetail->supplier_id}}';
    var barcode = $(this).val();  
    var type = '{{$datadetail->type}}';

    if (event.which == 13) {
      // event.preventDefault();
      // productSupplier(barcode,supplier,type)
      // .done(function(result){
      //   if(result == 'noproduct'){
      //     showModalInfo('Data barang tidak ditemukan, silahkan tambah data.');
      //     $('#tambahProduct').prop('disabled',false);
      //   }else if(result.price == ''){
      //     showModalInfo('Harga supplier belum tersedia, silahkan buat baru.');
      //     $('#purchaseBarcode').attr('data-id',result.productid);
      //     $('#purchaseBarcode').attr('data-name',result.productname);
      //     $('#tambahHarga').prop('disabled',false);
      //   }else{
      //     tambahList(purchase_number, result);
      //   }
      // })
      // .fail();
      cek_fieldbarcode();
      $('#qty').val('');
      $('#qty').focus();
    }
  });


  $('#qty').keypress(function(event){
    var purchase_number = '{{$datadetail->purchase_number}}';
    var supplier = '{{$datadetail->supplier_id}}';
    var barcode = $('#purchaseBarcode').val();  
    var type = '{{$datadetail->type}}';

    if (event.which == 13) {
      cek_fieldbarcode();
      event.preventDefault();
      productSupplier(barcode,supplier,type)
      .done(function(result){
        if(result == 'noproduct'){
          showModalInfo('Data barang tidak ditemukan, silahkan tambah data.');
          $('#tambahProduct').prop('disabled',false);
        }else if(result.price == ''){
          showModalInfo('Harga supplier belum tersedia, silahkan buat baru.');
          $('#purchaseBarcode').attr('data-id',result.productid);
          $('#purchaseBarcode').attr('data-name',result.productname);
          $('#tambahHarga').prop('disabled',false);
        }else{
          tambahList(purchase_number, result);
        }
      })
      .fail();
    }
  });

  // $('#qty').keypress(function(e){
  //   var purchase_number = '{{$datadetail->purchase_number}}';
  //   var barcode = $('#purchaseBarcode').val();
  //   var supplier = '{{$datadetail->supplier_id}}';
  //   var type = '{{$datadetail->type}}';
  //   var _qty = $(this).val();

  //   if (e.which == 13) {
  //     e.preventDefault();
  //     productSupplier(barcode,supplier,type)
  //     .done(function(result){
  //       var _tr = 'tr[data-product="'+result.productid+'"]';
  //       var _pri = result.price * _qty;
  //       var pdEdit = {
  //         purNumber: purchase_number,
  //         proId: result.productid,
  //         quantity: _qty,
  //         price: result.price,
  //         total: _pri,
  //         _token: "{{csrf_token()}}"
  //       };

  //       editPurchaseDetail(pdEdit)
  //       .done(function(result){
  //         $(_tr).find('td[name="qty"]').text(_qty);
  //         $(_tr).find('td[name="tot"]').attr("data-value",_pri);
  //         $(_tr).find('td[name="tot"]').text(_pri.toString().replace(/\B(?=(\d{3})+\b)/g, ","));
  //         grandTotal()
  //         $('#qty').val('');
  //         $('#purchaseBarcode').val('').focus();
  //       }).fail(function(result){});
  //     });
  //   }
  // });

  $('#tambahProduct').click(function(e){
    e.preventDefault();
    barang = {
      supplier_id: parseInt('{{$datadetail->supplier_id}}'),
      supplier_name: '{{ $datadetail->supplier->name }}',
      type: '{{$datadetail->type}}',
      pnumber: '{{$datadetail->purchase_number}}',
      barcode: $('#purchaseBarcode').val(),
      url: '/purchaseproduct',
      title: 'Tambah Barang'
    }
    showModalForm(barang);
  });

  $('#tambahHarga').click(function(e){
    e.preventDefault();
    harga = {
      supplier_id: parseInt('{{$datadetail->supplier_id}}'),
      supplier_name: '{{ $datadetail->supplier->name }}',
      product_id: $('#purchaseBarcode').data('id'),
      product_name: $('#purchaseBarcode').data('name'),
      barcode : $('#purchaseBarcode').val(),
      type: '{{$datadetail->type}}',
      pnumber: '{{$datadetail->purchase_number}}',
      url: '/supplierprice',
      title: 'Tambah Harga'
    }
    showModalForm(harga);
  });

  $('#hapusItem').click(function(e){
    var pnumber = '{{$datadetail->purchase_number}}';
    var productid = $('#purchaseBarcode').data('id');
    var _url = '/purchasedetail/'+pnumber+'/'+productid+'/delete';

    $('#modalDelete').find('.btn-danger').attr('data-url',_url);
    $('#modalDelete').modal('show');
  });

  $('#simpanPembelian').click(function(){
    var ptable = $('#tablePurchase tbody tr');
    var dataPurchases = [];

    if(ptable.length != 0){
      ptable.each(function(){
        var purchaserow = {
          productid: $(this).data('product'),
          quantity: $(this).find('td[name="qty"]').text(),
          total: $(this).find('td[name="tot"]').data('value')
        }
        dataPurchases.push(purchaserow);
      });

      var insertPurchases = {
        _token:"{{csrf_token()}}",
        purNumber: '{{$datadetail->purchase_number}}',
        rows: dataPurchases
      };
    }

    $.ajax({
      type: "post",
      url: '/purchaseclose',
      data: insertPurchases,
      success: function(result){
        location.href = '/purchases';
      }
    });
  });

  function tambahList(purchase_number, data){
    var _tr = 'tr[data-product="'+data.productid+'"]';
    var exist = $('#tablePurchase').find(_tr);
    // console.log(exist.length);
    if(exist.length == 1){
      var qty = $(_tr).find('td[name="qty"]');
      var pri = $(_tr).find('td[name="pri"]');
      // var _qty = parseInt(qty.text()) + 1;
      var _qty = $('#qty').val();
      var _pri = data.price * _qty;
      var pdEdit = {
        purNumber: purchase_number,
        proId: data.productid,
        quantity: _qty,
        price: data.price,
        total: _pri,
        _token: "{{csrf_token()}}"
      };
      
      editPurchaseDetail(pdEdit)
      .done(function(result){
        $(_tr).find('td[name="qty"]').text(_qty);
        $(_tr).find('td[name="tot"]').attr("data-value",_pri);
        $(_tr).find('td[name="tot"]').text(_pri.toString().replace(/\B(?=(\d{3})+\b)/g, ","));
        grandTotal()
        cek_fieldbarcode();
        $('#qty').val('');
        $('#purchaseBarcode').val('');
        $('#purchaseBarcode').focus();
        cek_fieldbarcode();
      }).fail(function(result){});
    }else{
      var price = data.price.toString().replace(/\B(?=(\d{3})+\b)/g, ",");
      var pdAdd = {
        purNumber: purchase_number,
        proId: data.productid,
        price: data.price,
        _token: "{{csrf_token()}}"
      }
      // console.log(pdAdd);
      addPurchaseDetail(pdAdd)
      .done(function(result){
        listPurchaseDetail(data)
        console.log(data);
      }).fail();
    }
    cek_fieldbarcode();
    $('#qty').focus();
  }

  $('#print').click(function(event) {
    /* Act on the event */
    event.preventDefault();
    popup_print();
  });

  function popup_print(){
    window.open('{{ url("printpurchase") }}/{{ $datadetail->purchase_number }}','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
  }
</script>
@endsection