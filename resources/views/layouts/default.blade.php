
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
	<link rel="stylesheet" href="{{ url('css/style.css') }}">
	<link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}"> --}}
	<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ url('js/select2.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('js/dataTables.bootstrap.js') }}"></script>
	{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
	{{-- <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:300" rel="stylesheet"> --}}


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

	{{-- core style --}}
	<style>
		@font-face {
			font-family: libreFranklin;
			src: url({{ asset('Libre_Franklin/LibreFranklin-Light.ttf') }});
		}

		body{
			background-color: #F5F8FA;
			color: #636b6f;
			font-family: libreFranklin;
		}

		.main-content{
			/*padding-top: 90px;*/
			position: relative;
			min-height: calc(100vh - 193px);
			height: 100%;
			padding-bottom: 20px;
		}

		#master.active{
			color: #F4645F;
		}
	</style>


</head>
<body>
	
	@include('elements.header')

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

@include('elements.footer')

<script src="{{ url('js/typeahead.bundle.js') }}"></script>
<script src="{{ url('js/transaction.js') }}"></script>

</body>
</html>

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
