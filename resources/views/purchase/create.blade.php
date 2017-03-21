@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form id="simpanPembelianForm" action="POST">
			{{ csrf_field() }}
			<input id="purchasenumber" type="hidden" value="{{ $purchasenumber }}" name="purchase_number">

			<div class="row">
				<div class="col-md-12">
					<label for="supplierId">Nama Supplier</label>
					<select class="form-control" id="supplierId" name="supplier_id">
						<option disabled selected>Pilih</option>
						@foreach ($datasupplier as $element)
						<option value="{{ $element->id }}">{{ $element->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-6">
					<label for="1">Pilih Type Pembelian</label>
					<select class="form-control" id="tipepembelian" name="type">
						<option disabled selected>Pilih</option>
						<option value="pickup">Pickup</option>
						<option value="deliver">Deliver</option>
					</select>
				</div>

				<div class="col-md-12">
					<label for="2">Note</label>
					<textarea class="form-control" rows="3" class="form-control" rows="3" name="note" id="" cols="30" rows="10"></textarea>
				</div>

				<div class="col-md-12" style="padding-top: 10px;">
					<button id="buatPurchase" class="btn btn-default">KONFIRMASI</button>
				</div>
			</div>
		</form>
	</div>
</div>



<style>
	.qty, .harga{
		/*width: 48%;*/
		/*display: inline-block;*/
	}

	.qty{
		/*margin-right: 2%;*/
	}

	.divider{
		margin: 10px 0;
		width: 100%;
		height: 1px;
		border-bottom: 1px solid #e5e5e5;
	}
	.right{
		float: right;
	}
	.left{
		float: left;
	}
	.center{
		text-align: center;
	}

	#totalHarga{
		cursor: not-allowed;
	}
</style>

<script type="text/javascript">

	$(document).ready(function() {
		$("#supplierId").select2(); //plugin

		$('#buatPurchase').click(function(event) {
			event.preventDefault();
			var dt = $('#simpanPembelianForm').serialize();
			var pn = $('#purchasenumber').val();
			$.ajax({
				data: dt,
				dataType: 'text',
				url: '{{ url('tambahdetailpembelian') }}',
				type: 'POST',
				success: function(data){
					window.location.href = '{{ url('purchase') }}' + '/' + pn;
				}
			})
		});


		// $('#purchaseBarcode').keypress(function(event){
		// 	var supplier = $('#supplierId option:selected').val();
		// 	var type = $('#tipepembelian option:selected').val();
		// 	var barcode = $(this).val();  

		// 	if (event.which == 13) {
		// 		event.preventDefault();
		// 		productSupplier(barcode,supplier,type).done(function(result){
		// 			if(result == 'noproduct'){
		// 				showModalInfo('Nama barang tidak tersedia, silahkan tambah data baru.');
		// 				$('#tambahProduct').prop('disabled',false);
		// 			}else if(result == 'noprice'){
		// 				showModalInfo('Data harga barang belum tersedia, silahkan buat baru?');
		// 			}else{
		// 				$('table>tbody').append(
		// 					'<tr><td>!</td>'+
		// 					'<td>'+result.productname+'</td>'+
		// 					'<td>'+result.price+'</td>'+
		// 					'<td>1</td>'+
		// 					'<td></td>'+
		// 					'</tr>'
		// 					);
		// 	    	// $('#purchaseBarcode').val('');
		// 	    	$('#qty').val(1).focus();
		// 	    }
		// 	})
		// 		.fail();
		// 	}
		// });

		// $('#tambahProduct').click(function(){
		// 	var _url = '{{url("product/create")}}';
		// 	var barcode = $('#purchaseBarcode').val();
		// 	showModalPage(_url,barcode,'Tambah Barang');
		// });


		// $('#namabarang').change(function(){
		// 	var idproduct = $(this).val();
		// 	var idsupplier = $("#supplierId option:selected").val();
		// 	var tipebeli = $('#tipepembelian').val();

		// 	$.ajax({
		// 		url: '{{ url("databarang") }}' + '/' + idsupplier + '/' + idproduct + '/' + tipebeli,
		// 		type: 'GET',
		// 		dataType: 'JSON',
		// 		success: function(data){
		// 			for(var i in data){
		// 				// $('.hargaBeli').val(data[i].price);
		// 				// $('#namabarang').val(idproduct).change();
		// 				// $('#productUnit').val(data[i].unit);
		// 				var pivot = data[i].pivot;
		// 			}
		// 			if(data.length === 0){
		// 				$('#myModal').modal('show')
		// 			}else{
		// 				$('.hargaBeli').val(pivot.price);
		// 			}
		// 		}
		// 	})
		// });

		// setInterval(function(){
		// 	$.ajax({
		// 		url: '{{ url('tabledetailpembelian') }}',
		// 		success: function(data){
		// 			$('#table').html(data);
		// 		}
		// 	})
		// }, 1000);

		

		// $('#simpanPembelian').click(function(event) {
		// 	event.preventDefault();
		// 	var bc = $('#simpanPembelianForm').serialize();
		// 	$.ajax({
		// 		data: bc,
		// 		url: '{{ url('purchase') }}',
		// 		type: 'POST',
		// 		success: function(data){
		// 			window.location.href = '{{ url('purchase') }}';
		// 		}
		// 	})
		// });



	});
</script>
@endsection












