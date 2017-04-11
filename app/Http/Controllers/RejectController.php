<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reject;
use App\Product;

class RejectController extends Controller
{

	function view(){
		$datareject = Reject::all();
		return view('reject.view', compact('datareject'));
	}

	function create($idproduct){
		$databarang = Product::find($idproduct);
		return view('reject.create', compact('databarang'));
	}

	function store(Request $request){
		$simpan = Reject::create([
			'product_id' => $request->product_id,
			'amount' => $request->amount,
			]);

		
		Product::find($request->product_id)->update([
			'stock' => ($request->stock) - ($request->amount),
			]);

		return redirect('product');
	}

	function return_barang($id){
		$data = Reject::find($id);
		Product::where('id', $data->product_id)->update([
			'stock' => ($data->amount) + ($data->product->stock),
			]);

		Reject::destroy($id);

		return redirect('reject');
	}

	function rejectreport(Request $request){
		$datareport = Reject::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();
		$from = $request->from;
		$to = $request->to;
		return view('reject.reportresult', compact('datareport', 'from', 'to'));

	}
}
