@extends('layouts.default')
@section('content')
<h1 class="text-center">Laporan Pembelian</h1>
{{-- <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan Penjualan dari tgl {{ $from }} sampai tgl {{ $to }}</p> --}}
<div class="row">
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nomor Transaksi</th>
					<th>Supplier</th>
					<th>Sub Total</th>
				</tr>
			</thead>


			<tbody>
				@php ($i = 0)
				@foreach ($datareport as $a)
				@php ($i++)
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $a->purchase_number }}</td>
					<td>{{ $a->supplier->name }}</td>
					<td>{{ $a->total_price }}</td>
				</tr>
				@endforeach
				<tr style="background-color: #F9F9F9;">
					<td colspan="3" style="font-weight: bold;">TOTAL</td>
					<td colspan="1" style="font-weight: bold; color: #F4645F;">{{ $datareport->sum('total_price') }}</td>
				</tr>
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












