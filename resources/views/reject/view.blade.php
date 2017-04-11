@extends('layouts.default')
@section('content')
<br>
<h1 class="text-center">Data Barang Yang Ter-Reject</h1>
<table id="rejectTable" class="display">
	<thead>
		<tr>
			{{-- <th>Barcode</th> --}}
			<th>Barcode</th>
			<th>Nama Barang</th>
			<th>Unit</th>
			<th>Jumlah Reject</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($datareject as $data)
		<tr>
			<td>{{ $data->product->barcode }}</td>
			<td>{{ $data->product->name }}</td>
			<td>{{ $data->product->unit }}</td>
			<td>{{ $data->amount }}</td>
			<td>
				<a class="mycolor" href="{{ url('reject/'. $data->id .'/return') }}">Kembalikan ke stock</a>
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
		$('#rejectTable').DataTable();
	});
</script>

@endsection
