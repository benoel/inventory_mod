<table class="table">
	<thead>
		<tr>
			{{-- <th>No.</th> --}}
			<th>Nama Barang</th>
			<th>Qty</th>
			<th>Harga Beli</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>

		@foreach ($dttable as $element)
		{{-- {{ $i=1 }} --}}
		<tr>
			{{-- <td>{{ $i++ }}</td> --}}
			<td>{{ $element->product->name }}</td>
			<td>{{ $element->quantity }}</td>
			<td>{{ $element->price }}</td>
			<td class="price">{{ $element->total }}</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3"><b>Total</b></td>
			<td id="totaltable">{{ $dttable->sum('total') }}</td>
		</tr>
	</tbody>
</table>

<style>
	
</style>

<script>
	// $(document).ready(function(){
	// 	sum = 0;
	// 	$('.price').each(function() {     
	// 		sum += parseInt($(this).text());                     
	// 	});
	// 	$('#totaltable').text(sum);
	// })
</script>