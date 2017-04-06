
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Inventory_mod</title>
	<link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/style.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}"> --}}
	<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('js/select2.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/dataTables.bootstrap.js') }}"></script>

	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
	<!-- Optional theme -->
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

	<!-- Latest compiled and minified JavaScript -->
	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

	{{-- data table --}}
	{{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css"> --}}

	{{-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script> --}}
	{{-- 
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> --}}
	<script src="{{ url('js/jquery.scannerdetection.js') }}"></script>
	<style>
		body{
			background-color: #F5F8FA;
			color: #636b6f;
			font-family: 'Raleway', sans-serif;
			font-weight: 100;
		}
	</style>
</head>
<body>
	
	<header>
		<div class="brand"><a href="{{ url('/') }}">Inventory Mod</a></div>
		<ul class="navq">
			<li><a href="{{ url('sale/create') }}">PENJUALAN</a></li>
			<li><a href="{{ url('purchase/create') }}">PEMBELIAN</a></li>
			<li>
				<a href="#" id="master">MASTER</a>
				<div class="dropdown-field">
					<ul class="dropdown-list">
						<li><a href="{{ url('sale') }}">List Penjualan</a></li>
						<li><a href="{{ url('purchases') }}">List Pembelian</a></li>
						<li><a href="{{ url('product') }}">Barang</a></li>
						<li><a href="{{ url('category') }}">Kategory</a></li>
						<li><a href="{{ url('supplier') }}">Supllier</a></li>
						<li><a href="{{ url('customer') }}">Customer</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<div class="line"></div>
	</header>

	{{-- <nav class="navbar navbar-inverse navbar-fixed-top">
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
						<a href="{{ url('purchase/create') }}" id="createPurchase">
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
						<li><a href="{{url('purchases')}}">List Pembelian</a></li>
						<li><a href="{{url('sale')}}">List Penjualan</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{url('product')}}">Barang</a></li>
						<li><a href="{{url('category')}}">Kategori</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{url('supplier')}}">Supplier</a></li>
						<li><a href="{{url('customer')}}">Customer</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav> --}}
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

<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Oops...!</h4>
			</div>
			<div class="modal-body"><p></p></div>
			<div class="modal-footer">
				<button id="closeModalInfo" type="button" class="btn btn-primary" data-dismiss="modal">OKE</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPage" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			{{-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"></h4>
			</div> --}}
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body"><p>Anda yakin akan menghapus data ?</p></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal" data-url="">HAPUS</button>
			</div>
		</div>
	</div>
</div>

<div class="footer">
	<div class="description-footer text-center">COPYRIGHT © Inventory</div>
</div>

<script src="{{ url('js/typeahead.bundle.js') }}"></script>
<script src="{{ url('js/transaction.js') }}"></script>

</body>
</html>
<style>
	
	.footer{
		background-color: #F9F9F9;
		height: 85px;
		width: 100%;
	}
	.description-footer{
		padding: 28px;
		color: #B3B3B3;
		font-size: 17px;
	}

	header{
		border-top: 11px solid #F4645F;
		background: transparent;
		width: 100%;
		padding: 20px;
		padding-right: 90px;
		margin-bottom: 20px;
		height: 88px;
		border-bottom: 1px solid #dee0df;
	}


	header .brand a{
		float: left;
		font-size: 21px;
		color: #555;
		margin-left: 95px;
		font-weight: bold;
	}
	header ul{
		padding: 10px;
	}
	header .navq{
		float: right;
	}

	header .navq li{
		list-style: none;
		display: inline-block;
		/*overflow: hidden;*/
		margin: 0 15px;
	}
	header .navq li a{
		padding: 0 20px;
	}
	header .navq li a, header .dropdown-list a{
		color: #555;
		text-decoration: none;
	}

	header .dropdown-field{
		display: none;
		background-color: #fff;
		position: absolute;
		margin-top: 27px;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		background-clip: padding-box;
		z-index: 99;
	}
	header .dropdown-field.show{
		display: block;
	}

	.dropdown-list{
		padding: 10px 0px;
	}

	header .dropdown-list li{
		display: list-item;
		margin: 0;
	}
	header .dropdown-list li a:hover{
		background-color: #f5f5f5;
	}

	header .dropdown-list li a{
		padding: 5px 16px;
		display: block;
	}
	.main-content{
		/*padding-top: 90px;*/
		position: relative;
		min-height: calc(100vh - 193px);
		height: 100%;
	}

	#master.active{
		color: #F4645F;
	}

</style>	

<script>
	$(document).ready(function(){
		$('#master').click(function(e) {
			e.preventDefault();
			$(this).toggleClass('active');
			/* Stuff to do when the mouse enters the element */
			$('.dropdown-field').toggleClass('show');
		});
		$('.main-content').click(function(event) {
			/* Act on the event */
			var a = $('.dropdown-field').hasClass('show');
			if (a == true) {
				$('#master').removeClass('active');
				$('.dropdown-field').removeClass('show');
			}
		});
	})
	
</script>
