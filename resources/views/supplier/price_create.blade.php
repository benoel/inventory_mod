<div class="container-fluid">
  <form id="productSupplierForm" action="{{ url('supplierprice') }}" method="POST">
    {{ csrf_field() }}
    <input name="sid" type="hidden" class="form-control" id="sid">
    <input name="proId" type="hidden" class="form-control" id="proId">
    <input name="barcode" type="hidden" class="form-control" id="inputBarcode">
    <input name="purNumber" type="hidden" class="form-control" id="purNumber">
    <div class="row">
      {{-- <div class="col-md-12">
        <div class="form-group">
          <label for="1">Nama Supplier</label>
          <input name="supplier_name" type="text" class="form-control" id="_supplier" disabled="disabled">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="2">Nama Barang</label>
          <input name="product_name" type="text" class="form-control" id="_barang" disabled="disabled">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="3">Type</label>
          <input name="tipe" type="text" class="form-control" id="_tipe" readonly>
        </div>
      </div> --}}
      <input name="supplier_name" type="hidden" class="form-control" id="_supplier">
      <input name="product_name" type="hidden" class="form-control" id="_barang">
      <input name="tipe" type="hidden" class="form-control" id="_tipe">
      <input name="qty" type="hidden" class="form-control" id="_qty">

      <div class="col-md-12">
        Tambah harga beli barang <span style="color: #F4645F; font-style: italic; font-weight: bold;" id="productName"></span> ke supplier <span style="color: #F4645F; font-style: italic; font-weight: bold;" id="supplierName"></span> dengan type beli <span style="color: #F4645F; font-style: italic; font-weight: bold;" id="tipe"></span>
      </div>


      <div class="col-md-12">
        <div class="divider"></div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="4">Harga Beli</label>
          <input name="price" type="text" class="form-control" id="_harga">
        </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="form-group">
          <label for="4">Qty</label>
          <input name="qty" type="text" class="form-control" id="_qty" value="1">
        </div>
      </div> --}}
    </div>  
    <div class="divider"></div>
    <button id="simpanHargaSupplier" type="submit" class="btn btn-primary pull-right">SIMPAN</button>
  </form>
</div>

<script>
  $('#simpanHargaSupplier').click(function(e){
    e.preventDefault();
    var dt = $('#productSupplierForm').serialize();
    var addlist = {
      productid: $('#proId').val(),
      productname: $('#_barang').val(),
      barcode: $('#inputBarcode').val(),
      quantity: $('#_qty').val(),
      price: $('#_harga').val()
    };

    $.ajax({
      type: "POST",
      cache: false,
      url: '{{ url('supplierprice') }}',
      data: dt,
    }).done(function(result){
      // addPurchaseDetail(dt).done(function(result){
        listPurchaseDetail(addlist)
        $('#tambahHarga').prop('disabled',true);
      // });
    }).fail(function(error){});

    $('#modalForm').modal('hide');
    $('#purchaseBarcode').val('');
    $('#purchaseBarcode').focus();
    $('#qty').val('');
    $('#qty').attr('disabled', true);
    $('#hapusItem').attr('disabled', true);
  });
</script>