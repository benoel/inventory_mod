@extends('layouts.default')
@section('content')
<h1>Tambah Supplier</h1>
<div class="row">
	<div class="col-md-6">
		<form action="{{ url('supplier') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Nama Supplier</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Supplier">
			</div>
			<div class="form-group">
				<label for="2">Alamat</label>
				<textarea class="form-control" rows="3" name="address" id="" cols="30" rows="10"></textarea>
			</div>
			<div class="form-group">
				<label for="3">Telp</label>
				<input name="phone" type="text" class="form-control" id="3" placeholder="Telp">
			</div>
			<div class="form-group">
				<label for="4">Detail</label>
				<textarea class="form-control" rows="3" name="detail" id="" cols="30" rows="10"></textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>
@endsection