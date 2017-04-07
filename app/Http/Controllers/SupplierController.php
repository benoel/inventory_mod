<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\PurchaseDetail;

class SupplierController extends Controller
{
	function view(){
		$datasupplier = Supplier::all();
		return view('supplier/view', compact('datasupplier'));
	}

	function create(){
		return view('supplier.create');
	}

	function store(Request $request){
		Supplier::create([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'detail' => $request->detail,
			]);

		return redirect('supplier');
	}

	function edit($id){
		$data = Supplier::find($id);
		return view('supplier.edit', compact('data'));
	}

	function update(Request $request, $id){
		Supplier::find($id)->update([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'detail' => $request->detail,
			]);

		return redirect('supplier');
	}

	function delete($id){
		Supplier::destroy($id);
		return redirect('supplier');
	}

	function price_store(Request $request)
	{
		Supplier::find($request->sid)->products()->attach(
			['product_id' => $request->proId],
			[
			'type' => $request->tipe,
			'price' => $request->price
			]
			);

		PurchaseDetail::create([
			'purchase_number' => $request->purNumber,
			'product_id' => $request->proId,
			'quantity' => $request->qty,
			'price' => $request->price,
			'total' => $request->price * $request->qty,
			]);
		// dd($request);
		return response()->json('success');
	}
}
