<header>
	<div class="brand"><a href="{{ url('/') }}">Inventory Mod</a></div>
	<ul class="navq">
		<li><a href="{{ url('sale/create') }}">PENJUALAN</a></li>
		<li><a href="{{ url('purchase/create') }}">PEMBELIAN</a></li>
		<li id="master">
			<a href="#" id="toggle">MASTER</a>
			<div class="dropdown-field">
				<ul class="dropdown-list">
					<li><a href="{{ url('sale') }}">List Penjualan</a></li>
					<li><a href="{{ url('purchases') }}">List Pembelian</a></li>
					<div class="divider"></div>
					<li><a href="{{ url('product') }}">Barang</a></li>
					<li><a href="{{ url('category') }}">Kategory</a></li>
					<div class="divider"></div>
					<li><a href="{{ url('supplier') }}">Supllier</a></li>
					<li><a href="{{ url('customer') }}">Customer</a></li>
					<div class="divider"></div>
					<li><a href="{{ url('reject') }}">Barang Reject</a></li>
				</ul>
			</div>
		</li>
		<li id="laporan">
			<a href="#" id="toggle">LAPORAN</a>
			<div class="dropdown-field">
				<ul class="dropdown-list">
					<li><a href="{{ url('salereport') }}">Laporan Penjualan</a></li>
					<li><a href="{{ url('purchasereport') }}">Laporan Pembelian</a></li>
					<div class="divider"></div>
					<li><a href="{{ url('rejectreport') }}">Laporan Barang Reject</a></li>
					
				</ul>
			</div>
		</li>
	</ul>
	<div class="line"></div>
</header>

<style>
	header{
		border-top: 11px solid #F4645F;
		background-color: #F9F9F9;
		width: 100%;
		padding: 20px;
		padding-right: 90px;
		/*margin-bottom: 20px;*/
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

	#toggle.active{
		color: #F4645F;
	}
</style>

<script>
	$(document).ready(function(){


		$('#master').click(function(e) {
			// e.preventDefault();
			$(this).find('#toggle').toggleClass('active');
			$(this).find('.dropdown-field').toggleClass('show');
			var laporan = $('#laporan').find('#toggle').hasClass('active');
			if (laporan == true) {
				$('#master').find('#toggle').addClass('active');
				$('#master').find('.dropdown-field').addClass('show');
				$('#laporan').find('#toggle').removeClass('active');
				$('#laporan').find('.dropdown-field').removeClass('show');
			}
		});

		$('#laporan').click(function(e) {
			// e.preventDefault();
			$(this).find('#toggle').toggleClass('active');
			$(this).find('.dropdown-field').toggleClass('show');
			var master = $('#master').find('#toggle').hasClass('active');
			if (master == true) {
				$('#master').find('#toggle').removeClass('active');
				$('#master').find('.dropdown-field').removeClass('show');
				$('#laporan').find('#toggle').addClass('active');
				$('#laporan').find('.dropdown-field').addClass('show');

			}
		});

		$('.main-content, .footer').click(function(event) {
			/* Act on the event */
			var a = $('.dropdown-field').hasClass('show');
			if (a == true) {
				$('#master, #laporan').find('#toggle').removeClass('active');
				$('.dropdown-field').removeClass('show');
			}
		});

		



	})
	
</script>