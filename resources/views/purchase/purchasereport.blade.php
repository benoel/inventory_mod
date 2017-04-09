@extends('layouts.default')
@section('content')
<h1 class="text-center">Laporan Pembelian</h1>
<div class="row">
	<form action="{{ url('purchasereport') }}" method="post">
		{{ csrf_field() }}
		<div class="col-md-4 col-md-offset-4">
			<h4 class="text-center">Dari Tanggal</h4>
			<div class="input-group date">
				<input type="text" name="from" class="form-control datepicker">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</div>
			</div>

		</div>
		<div class="col-md-4 col-md-offset-4">
			<h4 class="text-center">Sampai Tanggal</h4>
			<div class="input-group date">
				<input type="text" name="to" class="form-control datepicker">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center">
			<br>
			<button type="submit" class="btn btn-default">SUBMIT</button>
		</div>
	</form>
</div>

<style>
	
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$('.datepicker').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});

	});
</script>
@endsection












