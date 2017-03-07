
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Inventory_mod</title>
	<link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
	<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ url('js/select2.min.js') }}"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	{{-- data table --}}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
	{{-- 
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> --}}
	<script src="{{ url('js/jquery.scannerdetection.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
				<li><a href="{{ url('purchase') }}">Pembelian</a></li>
				<li><a href="{{ url('sale') }}">Penjualan</a></li>
			</ul>
		</li>
		<li>Master
			<ul>
				<li><a href="{{ url('product') }}">Barang</a></li>
				<li><a href="{{ url('supplier') }}">Supplier</a></li>
				<li><a href="{{ url('customer') }}">Customer</a></li>
				<li><a href="{{ url('category') }}">Kategori</a></li>
			</ul>
		</li>
	</ul>

	<div class="main-content">
		@yield('content')
	</div>

	<script src="{{ url('js/transaction.js') }}"></script>
	
	<style>
		.main-content{
			margin-left: 270px;
			margin-top: 20px;
			padding-right: 30px;
			margin-top: 50px;
			padding-top: 30px;
		}

		nav.navbar.navbar-inverse,
		nav.navbar.navbar-default{
			margin-bottom: 0;
			border: none;
			border-radius: 0;
		}
		.sidenav{
			padding-top: 20px;
			background-color: #333333;
			position: fixed;
			border-right: 1px solid #E9EBEE;
			width: 250px;
			height: 100%;
			padding-left: 20px;
			color: #fafafa;
		}
		.sidenav li{
			list-style: none;
			padding: 5px;
		}

		.sidenav li ul li a{
			color: #fafafa;
		}
		
		select, .select2{
			margin-bottom: 20px;
		}

	</style>
</body>
</html>