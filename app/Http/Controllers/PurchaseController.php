<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\PurchaseDetailProduct;
use App\PurchaseDetail;


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
		// Purchase::create([
		DB::table('purchases')->insert([
			'purchase_number' => $request->purchase_number,
			'supplier_id' 		=> $request->supplier_id,
			'type' 						=> $request->type,
			'note' 						=> $request->note,
			]);
		// dd($request->id);
		// return $request->lastInsertId;
	}

	function table(){
		$dttable = PurchaseDetailProduct::all();
		return view('purchase.table', compact('dttable'));
	}

	function purchasedetail($purchase_number){
		$datadetail = Purchase::where('purchase_number', $purchase_number)
		->with('purchasedetails','supplier')
		->first();

		$price = Supplier::find($datadetail->supplier_id)
		->products()
		->wherePivot('type',$datadetail->type)
		->get();
		if($datadetail->status == 'open'){
			$dtstatus = '';
		}else{
			$dtstatus = 'disabled';
		}

		return view('purchase.purchasing', compact('datadetail','price','dtstatus'));
		// return response([$datadetail,$price]);
	}

	function product_store(Request $request)
	{
		$product = Product::create([
			'name' => $request->name,
			'barcode' => $request->barcode,
			'unit' => $request->unit,
			'stock' => $request->stock,
			'price_sale' => $request->price_sale,
			'category_id' => $request->category_id,
			]);

		$product->suppliers()->attach(
			['supplier_id' => $request->sid],
			[
			'type' => $request->_tipe,
			'price' => $request->price_buy
			]
			);

		$product->purchasedetails()->create([
			'purchase_number' => $request->purNumber,
			'quantity' => $request->kuantiti,
			'price' => $request->price_buy,
			'total' => $request->price_buy * $request->kuantiti
			]);

		$productId = Product::where('barcode', $request->barcode)->first();

		return $productId->id;
	}

	function close(Request $request)
	{
		$grandTotal = 0;
		foreach ($request->rows as $key) {
			$dtproduct = Product::find($key['productid']);
			$dtproduct->update([
				'stock' => $dtproduct->stock + $key['quantity'],
				]);
			$grandTotal += $key['total'];
		}

		Purchase::where('purchase_number',$request->purNumber)->update([
			'status' => 'close',
			'total_price' => $grandTotal,
			]);
  	// $saw = array_sum($request->rows['total']);
  	// return response()->json($request->rows['total']);
  	// return redirect('');//->action('purchases');
  	// return response()->json($grandTotal);
		return 'success';
	}

	function previewsale($purchase_number){
		$datadetail = Purchase::where('purchase_number', $purchase_number)->get();
		$purchasenumber = $purchase_number;
		$databarang = PurchaseDetail::where('purchase_number', $purchase_number)->get();

		return view('purchase.viewdetail', compact('datadetail', 'purchasenumber', 'databarang'));
		
	}

	function purchasereport(Request $request){
		$datareport = Purchase::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();
		
		$from = $request->from;
		$to = $request->to;

		return view('purchase.reportresult', compact('datareport', 'from', 'to'));
	}



}













