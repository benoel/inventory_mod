@extends('layouts.default')
@section('content')
<a href="{{ url('category/create') }}" class="btn btn-default">Tambah Kategori Barang</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			{{-- <th>Barcode</th> --}}
			<th>Nama Kategori</th>
			<th>Deskripsi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datacategory as $data)
		<tr>
			<td>{{ $data->name }}</td>
			<td>{{ $data->description=='' ? '-' : $data->description }}</td>
			<td><a href="{{ url('category/'. $data->id .'/edit') }}">Edit</a> || <a href="{{ url('category/'. $data->id .'/delete') }}">Delete</a> </td>
		</tr>
		@endforeach
	</tbody>
</table>

<style>
	.btn{
		margin-bottom: 30px;
	}
</style>

<script>
	$(document).ready(function () {
		$('#inventoryTable').DataTable();
	});
</script>

@endsection
