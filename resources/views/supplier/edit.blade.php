@extends('layouts.default')
@section('content')
<h1 class="text-center">Edit product</h1>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="{{ url('supplier/'. $data->id .'') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="1">Nama Supplier</label>
				<input name="name" type="text" class="form-control" id="1" placeholder="Nama Supplier" value="{{ $data->name }}">
			</div>
			<div class="form-group">
				<label for="2">Alamat</label>
				<textarea class="form-control" rows="3" name="address" id="" cols="30" rows="10">{{ $data->address }}</textarea>
			</div>
			<div class="form-group">
				<label for="3">Telp</label>
				<input name="phone" type="text" class="form-control" id="3" placeholder="Telp" value="{{ $data->phone }}">
			</div>
			<div class="form-group">
				<label for="4">Detail</label>
				<textarea class="form-control" rows="3" name="detail" id="" cols="30" rows="10">{{ $data->detail }}</textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>
	</div>
</div>

@endsection