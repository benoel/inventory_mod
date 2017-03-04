@extends('layouts.default')
@section('content')
<h1>Edit product</h1>
<div class="row">
	<div class="col-md-6">
		<form action="{{ url('product/'. $data->id .'') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="1">Nama Barang</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Barang" value="{{ $data->name }}">
			</div>
			<div class="form-group">
				<label for="2">Unit</label>
				<input name="unit" type="text" class="form-control" id="2" placeholder="Unit" value="{{ $data->unit }}">
			</div>
			<div class="form-group">
				<label for="3">Stock</label>
				<input name="stock" type="text" class="form-control" id="3" placeholder="Stock" value="{{ $data->stock }}">
			</div>
			<div class="form-group">
				<label for="4">Harga Jual</label>
				<input name="price_sale" type="text" class="form-control" id="4" placeholder="Harga Jual" value="{{ $data->price_sale }}">
			</div>
			<div class="form-group">
				<label for="5">Harga Beli</label>
				<input name="price_buy" type="text" class="form-control" id="5" placeholder="Harga Beli" value="{{ $data->price_buy }}">
			</div>
			<select class="form-control" name="category_id">
				<option disabled selected>Pilih Kategory</option>
				@foreach ($category as $element)
				<option value="{{ $element->id }}" {{ $data->category_id==$element->id ? 'selected' : '' }}>{{ $element->name }}</option>
				@endforeach
			</select>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>



@endsection