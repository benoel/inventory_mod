
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
<body onLoad=”window.print()”>
	
	

	<div class="main-content container-fluid">
		@yield('content')
	</div>

	

	<script src="{{ url('js/typeahead.bundle.js') }}"></script>
	<script src="{{ url('js/transaction.js') }}"></script>

</body>
</html>


