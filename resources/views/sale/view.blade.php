@extends('layouts.default')
@section('content')
<a href="{{ url('sale/create') }}" class="btn btn-default">Input Penjualan</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>Nama Supplier</th>
			<th>Tipe</th>
			<th>Total Pembelian</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datasale as $data)
		<tr>
			<td>{{ $data->customer->name }}</td>
			<td>{{ $data->type }}</td>
			<td>{{ $data->total_price }}</td>
			<td>{{ $data->created_at }}</td>
			<td>{{ $data->status }}</td>
			<td>
				<a href="{{ url('sale/'. $data->sale_number) }}">View</a> 
				{{-- || <a href="{{ url('sale/'. $data->id .'/delete') }}">Delete</a>  --}}
			</td>
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
