@extends('layouts.default')
@section('content')

<a href="{{ url('product/create') }}" class="btn btn-default">Tambah Product</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			{{-- <th>Barcode</th> --}}
			<th>Nama Barang</th>
			<th>Unit</th>
			<th>Stock</th>
			<th>Kategory</th>
			<th>Harga Jual</th>
			<th>Harga Beli</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($dataproduct as $data)
		<tr>
			<td>{{ $data->name }}</td>
			<td>{{ $data->unit }}</td>
			<td>{{ $data->stock }}</td>
			<td>{{ $data->category->name }}</td>
			<td>{{ $data->price_buy }}</td>
			<td>{{ $data->price_sale }}</td>
			<td><a href="{{ url('product/'. $data->id .'/edit') }}">Edit</a> || <a href="{{ url('product/'. $data->id .'/delete') }}">Delete</a> </td>
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
