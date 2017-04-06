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

<style>
	header{
		border-top: 11px solid #F4645F;
		background-color: #F9F9F9;
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
</style>