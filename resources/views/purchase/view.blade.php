@extends('layouts.default')
@section('content')
<a href="{{ url('purchase/create') }}" class="btn btn-default">Input Pembelian</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>Nama Supplier</th>
			<th>Tipe</th>
			<th>Note</th>
			<th>Total Pembelian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datapurchase as $data)
		<tr>
			<td>{{ $data->supplier->name }}</td>
			<td>{{ $data->type }}</td>
			<td>{{ $data->note }}</td>
			<td>{{ $data->total_price }}</td>
			<td><a href="{{ url('purchase/'. $data->id .'/edit') }}">Edit</a> || <a href="{{ url('purchase/'. $data->id .'/delete') }}">Delete</a> </td>
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
