@extends('layouts.printpreview')
@section('content')
<h1 class="text-center">Detail Penjualan</h1>
@foreach ($datadetail as $dtdetail)
<div class="invoice-box">
	<table cellpadding="0" cellspacing="0">
		<tr class="top">
			<td colspan="2">
				<table>
					<tr>
						<td class="title">
							<img src="" style="width:100%; max-width:150px;">
						</td>

						<td>
							Nomor Penjualan #: {{ $salenumber }}<br>
							Created: {{ $dtdetail->created_at }}<br>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr class="information">
			<td colspan="2">
				<table>
					<tr>
						<td>
							Inventory MOD<br>
							Jakarta Barat
						</td>

						<td>
							Dipesan : {{ $dtdetail->customer->name }}<br>
							{{-- Kirim ke : <br> --}}
							{{-- Alamat : {{ $dtdetail->customer->address }}<br> --}}
							Telp/Hp : {{ $dtdetail->customer->phone }}
						</td>
					</tr>
				</table>
			</td>
		</tr>

		{{-- <tr class="heading">
			<td>
				Payment Method
			</td>

			<td>
				Transfer BCA#
			</td>
		</tr>

		<tr class="details">
			<td>
				Transfer to
			</td>

			<td>
				4910375682 a/n Fikrah Dinullah
			</td>
		</tr> --}}

		<tr class="heading">
			<td>
				Item
			</td>

			<td>
				Price
			</td>
		</tr>
		@foreach ($databarang as $element)
		<tr class="item">
			<td>
				{{ $element->product->name }} ({{ $element->quantity }} Pcs)
			</td>

			<td>
				Rp. {{ $element->total }}
			</td>
		</tr>
		@endforeach
		{{-- <tr class="item last">
			<td>
				Ongkir
			</td>

			<td>
				Rp.
			</td>
		</tr> --}}

		<tr class="total">
			<td></td>

			<td>
				Total: Rp. {{ $dtdetail->total_price }}
			</td>
		</tr>
		{{-- <tr>
			<td colspan="4"><b>Menunggu Konfirmasi Admin</b></td>
		</tr>
		<tr>
			<td colspan="2"><a href="" class="btn waves-effect waves-light mycolor">Konfirmasi Pembayaran</a></td>
		</tr> --}}
	</table>
</div>
@endforeach
<br>
<div class="text-center">
	{{-- <a href="{{ url('sale') }}" class="btn btn-default">KEMBALI</a> --}}
	<a href="#" id="printThis" class="btn btn-default">PRINT</a>
</div>

<script>
	$(document).ready(function(){
		$('#printThis').click(function(e){
			e.preventDefault();
			$(this).hide();
			window.print();
			$(this).show();
		})
	})
</script>

<style>
	.invoice-box{
		max-width:800px;
		margin:auto;
		padding:30px;
		border:1px solid #eee;
		box-shadow:0 0 10px rgba(0, 0, 0, .15);
		font-size:16px;
		line-height:24px;
		font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		color:#555;
		margin-top: 20px;
	}

	.invoice-box table{
		width:100%;
		line-height:inherit;
		text-align:left;
	}

	.invoice-box table td{
		padding:5px;
		vertical-align:top;
	}

	.invoice-box table tr td:nth-child(2){
		text-align:right;
	}

	.invoice-box table tr.top table td{
		padding-bottom:20px;
	}

	.invoice-box table tr.top table td.title{
		font-size:45px;
		line-height:45px;
		color:#333;
	}

	.invoice-box table tr.information table td{
		padding-bottom:40px;
	}

	.invoice-box table tr.heading td{
		background:#eee;
		border-bottom:1px solid #ddd;
		font-weight:bold;
	}

	.invoice-box table tr.details td{
		padding-bottom:20px;
	}

	.invoice-box table tr.item td{
		border-bottom:1px solid #eee;
	}

	.invoice-box table tr.item.last td{
		border-bottom:none;
	}

	.invoice-box table tr.total td:nth-child(2){
		border-top:2px solid #eee;
		font-weight:bold;
	}

	.mycolor-text.hover-white:hover{
		color: #fff;
	}

	@media only screen and (max-width: 600px) {
		.invoice-box table tr.top table td{
			width:100%;
			display:block;
			text-align:center;
		}

		.invoice-box table tr.information table td{
			width:100%;
			display:block;
			text-align:center;
		}
	}
</style>

@endsection