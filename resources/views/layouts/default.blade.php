
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Inventory_mod</title>
	<link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/style.css') }}">
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
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Inventory MOD</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="{{url('purchase/create')}}">
							<span class="glyphicon glyphicon-import" aria-hidden="true"></span> Pembelian
						</a>
					</li>
					<li>
						<a href="{{url('sale/create')}}">
							<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Penjualan
						</a>
					</li>
					<li class="dropdown">
						<a href="#" 
						class="dropdown-toggle" 
						data-toggle="dropdown" 
						role="button" 
						aria-haspopup="true" 
						aria-expanded="false"
						><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Master <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{url('purchase')}}">List Penjualan</a></li>
						<li><a href="{{url('sale')}}">List Pembelian</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{url('product')}}">Barang</a></li>
						<li><a href="{{url('category')}}">Kategori</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{url('supplier')}}">Supplier</a></li>
						<li><a href="{{url('costumer')}}">Customer</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav>
{{-- <ul class="sidenav">
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
</ul> --}}

<div class="main-content container-fluid">
	@yield('content')
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>One fine body&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script src="{{ url('js/typeahead.bundle.js') }}"></script>
<script src="{{ url('js/transaction.js') }}"></script>

</body>
</html>