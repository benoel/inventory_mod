<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Customer;
use App\Product;
use App\SaleDetailProduct;

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

		return view('sale.create', compact('salenumber', 'datacustomer', 'dataproduct'));
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
		SaleDetailProduct::create([
			'product_id' => $request->product_id,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'total' => $request->total,
			]);
		return 'oke COEG!!';
	}

	function table(){
		$dttable = SaleDetailProduct::all();
		return view('sale.table', compact('dttable'));
	}
}
