<form id="newProductSupplierForm" action="{{ url('purchaseproduct') }}" method="POST">
  {{ csrf_field() }}
  <input name="sid" type="hidden" class="form-control" id="sid">
  <input name="_tipe" type="hidden" class="form-control" id="_tipe">
  <input name="purNumber" type="hidden" class="form-control" id="purNumber">
  <input name="kuantiti" type="hidden" class="form-control" id="_qty">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="1">Barcode</label>
        <input name="barcode" type="text" class="form-control" id="inputBarcode" readonly>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group">
        <label for="1">Nama Barang</label>
        <input name="name" type="text" class="form-control" id="_barang" placeholder="Nama Barang">
      </div>
    </div>
    <div class="col-md-4">
      <label for="">Kategori</label>
      <select class="form-control" name="category_id">
        <option disabled selected>Pilih Kategory</option>
        @foreach ($category as $element)
        <option value="{{ $element->id }}">{{ $element->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label for="">Unit</label>
      <select class="form-control" name="unit" id="2">
        <option disabled selected>Pilih Unit Barang</option>
        <option value="Pcs">Pcs</option>
        <option value="Box">Box</option>
        <option value="Karton">Karton</option>
      </select>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="3">Stock Awal</label>
        <input name="stock" type="text" class="form-control" id="3" value="1">
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="4">Harga Jual</label>
            <input name="price_sale" type="text" class="form-control" id="4" placeholder="Harga Jual">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label style="color: #F4645F;" for="5">Harga Beli ke supplier <div id="namasuplier"></div> </label>
            <input style="border-color: #F4645F;" name="price_buy" type="text" class="form-control" id="price_buy" placeholder="Harga Beli">
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-12">
      <div class="divider"></div>
      <button id="simpanBarangSupplier" type="submit" class="btn btn-primary pull-right">SIMPAN</button>
    </div>
  </div>
</form>

<script>
  $('#simpanBarangSupplier').click(function(e){
    e.preventDefault();
    var dt = $('#newProductSupplierForm').serialize();
    // var addlist = {
    //   productid: $('#proId').val(),
    //   productname: $('#_barang').val(),
    //   barcode: $('#inputBarcode').val(),
    //   quantity: $('#qty').val(),
    //   price: $('#price_buy').val()
    // };

    $.ajax({
      type: "POST",
      cache: false,
      url: '/purchaseproduct',
      data: dt,
    }).done(function(result){
      var addlist = {
        productid: result,
        productname: $('#_barang').val(),
        barcode: $('#inputBarcode').val(),
        quantity: $('#_qty').val(),
        price: $('#price_buy').val()
      };
      listPurchaseDetail(addlist)
      $('#tambahProduct').prop('disabled',true);
    }).fail(function(error){});

    $('#modalForm').modal('hide');
    $('#qty').val('');
    $('#purchaseBarcode').val('').focus();
    $('#qty').attr('disabled', true);
    $('#hapusItem').attr('disabled', true);
  });
</script>