@extends('layouts.default')
@section('content')
<h1 class="text-center">Edit Kategori</h1>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="{{ url('category/'. $data->id .'') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="1">Nama Kategori</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Kategori" value="{{ $data->name }}">
			</div>
			<div class="form-group">
				<label for="2">Deskripsi</label>
				<textarea class="form-control" rows="3" name="description" id="" cols="30" rows="10">{{ $data->description }}</textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>

@endsection