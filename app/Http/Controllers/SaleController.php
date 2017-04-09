<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Customer;
use App\Product;
use App\SaleDetailProduct;
use App\SaleDetail;

class SaleController extends Controller
{
    // public function convertdate(){
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$date = date('dmy');
	// 	return $date;
	// }

	// public function autonumber($barang,$primary,$prefix){
	// 	$q=Purchase::select(DB::raw('MAX(RIGHT('.$primary.',5)) as kd_max'));
	// 	$prx=$prefix.$this->convertdate();
	// 	if($q->count()>0)
	// 	{
	// 		foreach($q->get() as $k)
	// 		{
	// 			$tmp = ((int)$k->kd_max)+1;
	// 			$kd = $prx.sprintf("%06s", $tmp);
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$kd = $prx."000001";
	// 	}

	// 	return $kd;
	// }


	function transaksi_id() {
		// ambil data maximal dari id transaksi
		// $dataMax = mysql_fetch_assoc(mysql_query("SELECT SUBSTR(MAX(no_invoice),-5) AS ID  FROM orders")); 
		$dataMax = Sale::select(DB::raw('substr(max(sale_number), -5)'));

		$param='SLE';

		if($dataMax->count() <= 0) { 
		// bila data kosong
			$ID = $param.'00001';
		}else {
			$MaksID = $dataMax->count();
			$MaksID++;
			// nilai kurang dari 10
			if($MaksID < 10) $ID = $param."0000".$MaksID; 
                // nilai kurang dari 100
			else if($MaksID < 100) $ID = $param."000".$MaksID;
                // nilai kurang dari 1000
			else if($MaksID < 1000) $ID = $param."00".$MaksID; 
                // nilai kurang dari 10000
			else if($MaksID < 10000) $ID = $param."0".$MaksID; 
                // lebih dari 10000
			else $ID = $MaksID; 
		}
		return $ID;
		// return $dataMax;
	}

	function view(){
		$datasale = Sale::all();
		return view('sale.view', compact('datasale'));
	}

	function create(){
		$salenumber = $this->transaksi_id();
		$datacustomer = Customer::all();
		$dataproduct = Product::all();
		// dd($purchasenumber->count());

		return view('sale.create_v2', compact('salenumber', 'datacustomer', 'dataproduct'));
	}

	function product_store(Request $request){
		$product = Product::create([
			'name' => $request->name,
			'barcode' => $request->barcode,
			'unit' => $request->unit,
			'stock' => $request->stock,
			'price_sale' => $request->price_sale,
			'category_id' => $request->category_id,
			]);

		$product->saledetails()->create([
			'sale_number' => $request->salNumber,
			'quantity' => $request->stock,
			'price' => $request->price_sale,
			'total' => $request->price_sale * $request->stock
			]);
		return "sukses";
	}

	function store(Request $request){
		$abc = SaleDetailProduct::all();
		$savepembelian = Sale::create([
			'customer_id' => $request->customer_id,
			'sale_number' => $request->sale_number,
			'type' => $request->type,
			'total_price' => $abc->sum('total'),
			]);
		if ($savepembelian) {
			// $aa = Purchase::where('purchase_number', $request->purchase_number)->first();
			$pdp = SaleDetailProduct::all();
			foreach ($pdp as $value) {
				$savepurchasedetail = DB::table('sale_details')->insert([
					'sale_number' => $request->sale_number,
					'product_id' => $value->product_id,
					'quantity' => $value->quantity,
					'price' => $value->price,
					'total' => $value->total,
					]);
			}
			if ($savepurchasedetail) {
				$dtproduct = SaleDetailProduct::all();
				foreach ($dtproduct as $a) {
					$dtproduct_stock = $a->product->stock;
					$updateproduct = Product::find($a->product_id)->update([
						'stock' => $dtproduct_stock - $a->quantity
						]);
				}
				if ($updateproduct) {
					$deletepurchasedetailproduct = SaleDetailProduct::truncate();
				}
			}	
		}

		// return redirect('purchase');
	}

	function edit($id){
		$data = Purchase::find($id);
		return view('purchase.edit', compact('data'));
	}

	function update(Request $request, $id){
		Purchase::find($id)->update([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'detail' => $request->detail,
			]);

		return redirect('purchase');
	}

	function delete($id){
		Sale::destroy($id);
		return redirect('sale');
	}

	function databarang($idbarang){

		$dtpro = Product::find($idbarang);

		return $dtpro;
	}

	function tambahdetail(Request $request){
		Sale::create([
			'sale_number' => $request->sale_number,
			'customer_id' => $request->customer_id,
			'type' => $request->type,
			'note' => $request->note,
			]);
	}

	function table(){
		$dttable = SaleDetailProduct::all();
		return view('sale.table', compact('dttable'));
	}

	function saledetail($sale_number){
		// $datadetail = Sale::where('sale_number', $sale_number)->get();
		// $salenumber = $sale_number;
		// $databarang = SaleDetail::where('sale_number', $sale_number)->get();

		// return view('sale.viewdetail', compact('datadetail', 'salenumber', 'databarang'));
		$datasaledetail = SaleDetail::where('sale_number', $sale_number)->get();
		$datadetail = Sale::where('sale_number', $sale_number)->first();
		if($datadetail->status == 'open'){
			$dtstatus = '';
		}else{
			$dtstatus = 'disabled';
		}


		// $dataproduct = Product::all();
		return view('sale.saling', compact('datadetail', 'datasaledetail', 'dtstatus'));

	}

	function close(Request $request)
	{
		$grandTotal = 0;
		foreach ($request->rows as $key) {
			$dtproduct = Product::find($key['productid']);
			$dtproduct->update([
				'stock' => $dtproduct->stock - $key['quantity'],
				]);
			$grandTotal += $key['total'];
		}

		Sale::where('sale_number',$request->salNumber)->update([
			'status' => 'close',
			'total_price' => $grandTotal,
			]);
		return 'success';
	}

	function previewsale($sale_number){
		$datadetail = Sale::where('sale_number', $sale_number)->get();
		$salenumber = $sale_number;
		$databarang = SaleDetail::where('sale_number', $sale_number)->get();

		return view('sale.viewdetail', compact('datadetail', 'salenumber', 'databarang'));
		
	}

	function salereport(Request $request){
 		// return $request->from.' 00:00:00';
		$datareport = Sale::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();
		$from = $request->from;
		$to = $request->to;
		return view('sale.reportresult', compact('datareport', 'from', 'to'));
		// foreach ($datareport as $key) {
		// 	return $key->sum('total_price');
		// }

	}

}
