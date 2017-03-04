<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

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
}
