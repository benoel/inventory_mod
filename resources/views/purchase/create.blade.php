@extends('layouts.default')
@section('content')
<h1>Input Detail Pembelian</h1>
<h2 class="right">No : {{ $purchasenumber }}</h2>
<div class="row">
	<div class="col-md-6">
		{{-- <div class="form-inline"> --}}
		<label for="1">Nama Supplier</label>
		<select class="form-control select2" id="supplierId" name="supplier_id">
			<option disabled selected>Pilih</option>
			@foreach ($datasupplier as $element)
			<option value="{{ $element->id }}">{{ $element->name }}</option>
			@endforeach
		</select>
		<label for="1">Pilih Type Pembelian</label>
		<select class="form-control" id="tipepembelian" name="">
			<option disabled selected>Pilih</option>
			<option value="pickup">Pickup</option>
			<option value="deliver">Deliver</option>
		</select>
		<div class="form-group">
			<label for="2">Note</label>
			<textarea class="form-control" rows="3" class="form-control" rows="3" name="note" id="" cols="30" rows="10"></textarea>
		</div>
		{{-- </div> --}}
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
								<label for="hargaBeli">Harga Beli</label>
								<input name="price" id="hargaBeli" type="text" class="form-control" id="hargaBeli" placeholder="Harga Beli">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="productName">Nama Barang</label>
								<input disabled type="text" class="form-control" id="productName" placeholder="Nama Barang">
							</div>
							<div class="form-group qty">
								<label for="totalHarga">Total Harga</label>
								<input name="total" disabled type="text" class="form-control" id="totalHarga" placeholder="Total Harga">
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

<table class="table">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Qty</th>
			<th>Harga Beli</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Beras</td>
			<td>6</td>
			<td>5000</td>
			<td>30000</td>
		</tr>
		<tr>
			<td colspan="4"><b>Total</b></td>
			<td>30000</td>
		</tr>
	</tbody>
</table>
<div class="center">
	<button class="btn btn-default">SIMPAN PEMBELIAN</button>
</div>

<div class="well" style="margin-top: 20px;">
	* Kuantitas barang akan otomatis bertambah jika klik "simpan"
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
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2();

		$('#barcode').change(function(){
			var idproduct = $(this).val();
			var idsupplier = $("#supplierId").val();
			var tipebeli = $('#tipepembelian').val();
			$.ajax({
				url: '{{ url("databarang") }}' + '/' + idproduct + '/' + idsupplier + '/' + tipebeli,
				type: 'GET',
				success: function(data){
					// $('#hargaBeli').val(data.price);
					// $('#productName').val(data.name);
					// $('#productUnit').val(data.unit);
					console.log(data);
				}
			})
		});

		$('#qty').keyup(function() {
			var jm = total();
			$('#totalHarga').val(jm);
		});

		$('#hargaBeli').keyup(function() {
			var jm = total();
			$('#totalHarga').val(jm);
		});

		$('#totalHarga').keyup(function() {
			var jm = total();
			$('#totalHarga').val(jm);
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
				url: '{{ url('tambahdetailpembelian') }}',
				type: 'POST',
				success: function(data){
					console.log(data);
				}
			})
		});




	});
</script>
@endsection












