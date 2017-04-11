@extends('layouts.default')
@section('content')
<h1 class="text-center">Masukan kuantiti barang yang di reject</h1>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="{{ url('reject') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="product_id" value="{{ $databarang->id }}">
			<div class="form-group">
				<label for="1">Nama Barang</label>
				<input name="name" type="text" class="form-control" readonly id="1" placeholder="Barcode Barang" value="{{ $databarang->name }}">
			</div>
			<div class="form-group">
				<label for="1">Barcode</label>
				<input name="barcode" type="text" class="form-control" id="1" readonly placeholder="Nama Barang" value="{{ $databarang->barcode }}">
			</div>
			<div class="form-group">
				<label for="1">Stock yang tersedia</label>
				<input name="stock" type="text" class="form-control" id="1" readonly placeholder="Nama Barang" value="{{ $databarang->stock }}">
			</div>
			<div class="form-group">
				<label for="2">Jumlah barang yang di reject</label>
				<input name="amount" type="text" class="form-control" id="2">
			</div>

			<br>
			<button type="submit" class="btn btn-primary">KONFIRMASI</button>
		</form>
	</div>
</div>



@endsection