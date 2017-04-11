@extends('layouts.default')
@section('content')
<h1 class="text-center">Laporan Barang Reject</h1>
{{-- <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan Penjualan dari tgl {{ $from }} sampai tgl {{ $to }}</p> --}}
<div class="row">
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nama barang</th>
					<th>Stock</th>
					<th>Reject</th>
					<th>Total Barang Keseluruhan</th>
				</tr>
			</thead>


			<tbody>
				@php ($i = 0)
				@foreach ($datareport as $a)
				@php ($i++)
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $a->product->name }}</td>
					<td>{{ $a->product->stock }}</td>
					<td>{{ $a->amount }}</td>
					<td>{{ $a->amount + $a->product->stock }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="text-center">
		<button id="kembali" class="btn btn-default">KEMBALI</button>
	</div>
	
</div>
<style>
	
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$('#kembali').click(function(event) {
			/* Act on the event */
			window.history.back();
		});
	});
</script>
@endsection












