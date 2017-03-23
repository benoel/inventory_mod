<form id="newProductSupplierForm" action="{{ url('tambahbarang') }}" method="POST">
  {{ csrf_field() }}
 {{--  <input name="sid" type="hidden" class="form-control" id="sid">
 <input name="_tipe" type="hidden" class="form-control" id="_tipe"> --}}
 <input name="salNumber" type="hidden" class="form-control" id="salNumber">
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
    <div class="form-group">
      <label for="2">Unit</label>
      <input name="unit" type="text" class="form-control" id="2" placeholder="Unit">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="3">Quantity</label>
      <input name="stock" type="text" class="form-control" id="3" value="1">
    </div>
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <label for="4">Harga Jual</label>
      <input name="price_sale" type="text" class="form-control" id="4" placeholder="Harga Jual">
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
    var addlist = {
      productname: $('#_barang').val(),
      barcode: $('#inputBarcode').val(),
      quantity: $('#3').val(),
      price: $('#price_sale').val()
    };

    $.ajax({
      type: "POST",
      cache: false,
      url: '/tambahbarang',
      data: dt,
    }).done(function(result){
      console.log(result);
      listSaleDetail(addlist)
      $('#tambahProduct').prop('disabled',true);
    }).fail(function(error){});

    $('#modalForm').modal('hide');
    $('#qty').val('');
    $('#saleBarcode').val('').focus();
  });
</script>