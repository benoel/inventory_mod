@extends('layouts.default')
@section('content')
<h1>Tambah Kategori</h1>
<div class="row">
	<div class="col-md-6">
		<form action="{{ url('category') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="1">Nama Kategori</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Kategori Barang">
			</div>
			<div class="form-group">
				<label for="2">Deskripsi</label>
				<textarea class="form-control" rows="3" class="form-control" rows="3" name="description" id="" cols="30" rows="10"></textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>
@endsection