<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\PurchaseDetailProduct;


class PurchaseController extends Controller
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
		$dataMax = Purchase::select(DB::raw('substr(max(purchase_number), -5)'));

		$param='PRC';

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
		$datapurchase = Purchase::all();
		return view('purchase.view', compact('datapurchase'));
	}

	function create(){
		$purchasenumber = $this->transaksi_id();
		$datasupplier = Supplier::all();
		$dataproduct = Product::all();
		// dd($purchasenumber->count());

		return view('purchase.create', compact('purchasenumber', 'datasupplier', 'dataproduct'));
	}

	function store(Request $request){
		$abc = PurchaseDetailProduct::all();
		$savepembelian = Purchase::create([
			'supplier_id' => $request->supplier_id,
			'purchase_number' => $request->purchase_number,
			'type' => $request->type,
			'total_price' => $abc->sum('total'),
			]);
		if ($savepembelian) {
			// $aa = Purchase::where('purchase_number', $request->purchase_number)->first();
			$pdp = PurchaseDetailProduct::all();
			foreach ($pdp as $value) {
				$savepurchasedetail = DB::table('purchase_details')->insert([
					'purchase_number' => $request->purchase_number,
					'product_id' => $value->product_id,
					'quantity' => $value->quantity,
					'price' => $value->price,
					'total' => $value->total,
					]);
			}
			if ($savepurchasedetail) {
				$dtproduct = PurchaseDetailProduct::all();
				foreach ($dtproduct as $a) {
					$dtproduct_stock = $a->product->stock;
					$updateproduct = Product::find($a->product_id)->update([
						'stock' => $dtproduct_stock + $a->quantity
						]);
				}
				if ($updateproduct) {
					$deletepurchasedetailproduct = PurchaseDetailProduct::truncate();
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
		Purchase::destroy($id);
		return redirect('purchase');
	}

	function databarang($idsupplier, $idbarang, $tipebeli){

		$supplier = Supplier::find($idsupplier)
		->products()
		->where('id',$idbarang)
		->wherePivot('type',$tipebeli)
		->get();

		return $supplier;
	}

	function tambahdetail(Request $request){
		PurchaseDetailProduct::create([
			'product_id' => $request->product_id,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'total' => $request->total,
			]);
		return 'oke COEG!!';
	}

	function table(){
		$dttable = PurchaseDetailProduct::all();
		return view('purchase.table', compact('dttable'));
	}

}













