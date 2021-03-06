@extends('layouts.default')
@section('content')
<h1>Input Detail Penjualan</h1>
<h2 class="right">No : {{ $salenumber }}</h2>
<div class="row">
	<div class="col-md-6">
		<form id="simpanPenjualanForm" action="POST">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $salenumber }}" name="sale_number">
			<label for="1">Nama Customer</label>
			<select class="form-control select2" id="customerId" name="customer_id">
				<option disabled selected>Pilih</option>
				@foreach ($datacustomer as $element)
				<option value="{{ $element->id }}">{{ $element->name }}</option>
				@endforeach
			</select>
			<label for="1">Pilih Type Pembelian</label>
			<select class="form-control" id="tipepembelian" name="type">
				<option disabled selected>Pilih</option>
				<option value="pickup">Pickup</option>
				<option value="deliver">Deliver</option>
			</select>
			<div class="form-group">
				<label for="2">Note</label>
				<textarea class="form-control" rows="3" name="note" id="" cols="30" rows="10"></textarea>
			</div>
		</form>
	</div>
</div>
<div class="divider"></div>
<div class="row">
	<div class="col-md-12">
		<form id="formTambahBarang" method="POST">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">Barang</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<label for="">Barcode</label>
							<select class="form-control select2" id="barcode" name="product_id">
								<option disabled selected>Pilih</option>
								@foreach ($dataproduct as $element)
								<option value="{{ $element->id }}">{{ $element->barcode }}</option>
								@endforeach
							</select>
							<div class="form-group qty">
								<label for="qty">Qty</label>
								<input name="quantity" type="text" class="form-control" id="qty" placeholder="Quantity">
							</div>
							<div class="form-group harga">
								<label for="hargaBeli">Harga Jual</label>
								<input disabled id="hargaBeli" type="text" class="form-control hargaBeli" id="hargaBeli" placeholder="Harga Beli">
								<input type="hidden" name="price" class="hargaBeli">
							</div>
						</div>
						<div class="col-md-6">
							{{-- <div class="form-group">
								<label for="productName">Nama Barang</label>
								<input disabled type="text" class="form-control" id="productName" placeholder="Nama Barang">
							</div> --}}
							<label for="">Nama Barang</label>
							<select class="form-control select2" id="namabarang" name="name">
								<option disabled selected>Pilih</option>
								@foreach ($dataproduct as $element)
								<option value="{{ $element->id }}">{{ $element->name }}</option>
								@endforeach
							</select>
							<div class="form-group qty">
								<label for="totalHarga">Total Harga</label>
								<input disabled type="text" class="form-control totalHarga" id="totalHarga" placeholder="Total Harga">
								<input type="hidden" name="total" class="totalHarga">
							</div>
							<div class="form-group harga">
								<label for="productUnit">Unit</label>
								<input disabled type="text" class="form-control" id="productUnit" placeholder="Unit">
							</div>
						</div>
						<div class="center">
							<button id="btnTambah" class="btn btn-default">Tambah</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="table">

</div>

<div class="center">
	<button id="simpanPembelian" class="btn btn-default">SIMPAN PENJUALAN</button>
</div>

<div class="well" style="margin-top: 20px;">
	* Kuantitas barang akan otomatis berkurang jika klik "simpan"
</div>

<style>
	.qty, .harga{
		width: 48%;
		display: inline-block;
	}

	.qty{
		margin-right: 2%;
	}

	.divider{
		margin: 10px 0;
		width: 100%;
		height: 1px;
		border-bottom: 1px solid #e5e5e5;
	}
	.right{
		float: right;
	}
	.left{
		float: left;
	}
	.center{
		text-align: center;
	}

	#totalHarga{
		cursor: not-allowed;
	}
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$(".select2").select2();

		$('#barcode').change(function(){
			var idproduct = $(this).val();
			$.ajax({
				url: '{{ url("databarangpenjualan") }}' + '/' + idproduct,
				type: 'GET',
				success: function(data){
					console.log(data);
					$('#namabarang').val(data.id).change();
					$('#productUnit').val(data.unit);
					$('.hargaBeli').val(data.price_sale)
				}
			})
		});

		setInterval(function(){
			$.ajax({
				url: '{{ url('tabledetailpenjualan') }}',
				success: function(data){
					$('#table').html(data);
				}
			})
		}, 1000);

		$('#qty').keyup(function() {
			var jm = total();
			$('.totalHarga').val(jm);
		});

		$('#hargaBeli').keyup(function() {
			var jm = total();
			$('.totalHarga').val(jm);
		});

		$('#totalHarga').keyup(function() {
			var jm = total();
			$('.totalHarga').val(jm);
		});

		function total(){
			var qty = $('#qty').val();
			var harga = $('#hargaBeli').val();
			var totalharga = qty * harga;
			return totalharga;

		}

		$('#btnTambah').click(function(event) {
			event.preventDefault();
			var dt = $('#formTambahBarang').serialize();
			$.ajax({
				data: dt,
				url: '{{ url('tambahdetailpenjualan') }}',
				type: 'POST',
				success: function(data){
					console.log(data);
				}
			})
		});

		$('#simpanPembelian').click(function(event) {
			event.preventDefault();
			var bc = $('#simpanPenjualanForm').serialize();
			$.ajax({
				data: bc,
				url: '{{ url('sale') }}',
				type: 'POST',
				success: function(data){
					window.location.href = '{{ url('sale') }}';
				}
			})
		});




	});
</script>
@endsection












