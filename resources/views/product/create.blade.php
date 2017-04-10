@extends('layouts.default')
@section('content')
<h1 class="text-center">Tambah product</h1>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
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
				<select class="form-control" id="2" name="unit">
					<option disabled selected></option>
					<option value="pcs">pcs</option>
					<option value="box">box</option>
					<option value="dus">dus</option>
					<option value="karton">karton</option>
				</select>
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
			<label for="cat">Katagory</label>
			<select class="form-control" id="cat" name="category_id">
				<option disabled selected></option>
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