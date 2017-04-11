@extends('layouts.default')
@section('content')
<br>
<a href="{{ url('customer/create') }}" class="btn btn-default">Tambah Customer</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			{{-- <th>Barcode</th> --}}
			<th>Nama Customer</th>
			<th>Alamat</th>
			<th>Phone</th>
			<th>Detail</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datacustomer as $data)
		<tr>
			<td>{{ $data->name }}</td>
			<td>{{ $data->address }}</td>
			<td>{{ $data->phone }}</td>
			<td>{{ $data->detail=='' ? '-' : $data->detail }}</td>
			<td><a class="mycolor" href="{{ url('customer/'. $data->id .'/edit') }}">Edit</a> || <a class="mycolor" href="{{ url('customer/'. $data->id .'/delete') }}">Delete</a> </td>
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
