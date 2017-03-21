@extends('layouts.default')
@section('content')
<a href="{{ url('purchase/create') }}" class="btn btn-default">Input Pembelian</a>

<table id="inventoryTable" class="display">
	<thead>
		<tr>
			<th>Note</th>
			<th>Nama Supplier</th>
			<th>Tipe</th>
			<th>Total Pembelian</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datapurchase as $data)
		<tr>
			<td>{{ $data->purchase_number }}</td>
			<td>{{ $data->supplier->name }}</td>
			<td>{{ $data->type }}</td>
			<td>{{ $data->total_price }}</td>
			<td>{{ $data->created_at }}</td>
			<td>{{ $data->status }}</td>
			<td>
				<a href="{{ url('purchase/'. $data->purchase_number) }}">View</a> 
				{{-- || <a href="{{ url('purchase/'. $data->id .'/delete') }}">Delete</a>  --}}
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
		$('#inventoryTable').DataTable({
			"order": [[0,"desc"]],
			"language": {
				"thousands": ","
			}
		});
	});
</script>

@endsection
