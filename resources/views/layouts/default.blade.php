
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
	<link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}"> --}}
	<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ url('js/select2.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('js/dataTables.bootstrap.js') }}"></script>
	<script src="{{ url('js/bootstrap-datepicker.min.js') }}"></script>
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
	{{-- <script src="{{ url('js/myjs.js') }}"></script> --}}

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
			min-height: calc(100vh - 173px);
			height: 100%;
			padding-bottom: 20px;
		}
	</style>


</head>
<body>
	
	@include('elements.header')


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


