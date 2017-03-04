@extends('layouts.default')
@section('content')
<h1>Input Detail Pembelian</h1>
<div class="row">
	<div class="col-md-6">
		<form action="{{ url('supplier') }}" method="POST">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">Data Transaksi</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="1">Nama Supplier</label>
						<input name="name" type="text" class="form-control" id="1" placeholder="Nama Supplier">
					</div>
					<div class="form-group">
						<label for="3">Type</label>
						<input name="phone" type="text" class="form-control" id="3" placeholder="Type">
					</div>
					<div class="form-group">
						<label for="2">Note</label>
						<textarea class="form-control" rows="3" class="form-control" rows="3" name="address" id="" cols="30" rows="10"></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection