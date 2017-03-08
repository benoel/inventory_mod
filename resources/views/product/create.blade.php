@extends('layouts.default')
@section('content')
<h1>Tambah product</h1>
<div class="row">
	<div class="col-md-6">
		<form action="{{ url('product') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Barcode</label>
				<input name="barcode" type="text" class="form-control" id="inputBarcode" placeholder="Barcode Barang">
			</div>
			<div class="form-group">
				<label for="1">Nama Barang</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Barang">
			</div>
			<div class="form-group">
				<label for="2">Unit</label>
				<input name="unit" type="text" class="form-control" id="2" placeholder="Unit">
			</div>
			<div class="form-group">
				<label for="3">Stock</label>
				<input name="stock" type="text" class="form-control" id="3" placeholder="Stock">
			</div>
			<div class="form-group">
				<label for="4">Harga Jual</label>
				<input name="price_sale" type="text" class="form-control" id="4" placeholder="Harga Jual">
			</div>
			<div class="form-group">
				<label for="5">Harga Beli</label>
				<input name="price_buy" type="text" class="form-control" id="5" placeholder="Harga Beli">
			</div>
			<select class="form-control" name="category_id">
				<option disabled selected>Pilih Kategory</option>
				@foreach ($category as $element)
				<option value="{{ $element->id }}">{{ $element->name }}</option>
				@endforeach
			</select>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>



@endsection