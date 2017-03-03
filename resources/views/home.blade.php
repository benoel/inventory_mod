@extends('layouts.default')

@section('content')

<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ url('/') }}">Inventory MOD</a>
		</div>
	</div><!-- /.container-fluid -->
</nav>
<ul class="sidenav">
	<li>Transaksi
		<ul>
			<li><a href="{{ url('pembelian') }}">Pembelian</a></li>
			<li><a href="{{ url('penjualan') }}">Penjualan</a></li>
		</ul>
	</li>
	<li>Master
		<ul>
			<li><a href="{{ url('product') }}">Barang</a></li>
			<li><a href="{{ url('supplier') }}">Supplier</a></li>
			<li><a href="{{ url('costumer') }}">Customer</a></li>
			<li><a href="{{ url('category') }}">Category</a></li>
		</ul>
	</li>
</ul>

<div class="main-content">
	<h1>Dashboard</h1>
</div>

<style>
	.main-content{
		margin-left: 270px;
		margin-top: 20px;
	}

	nav.navbar.navbar-default{
		margin-bottom: 0;
	}
	.sidenav{
		position: fixed;
		border-right: 1px solid #E9EBEE;
		width: 250px;
		height: 100%;
		padding-left: 20px;
	}
	.sidenav li{
		list-style: none;
		padding: 5px;
	}

	.sidenav li ul{
		/*display: none;*/
	}

</style>


@endsection