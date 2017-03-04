<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
	function view(){
		$datacustomer = Customer::all();
		return view('customer/view', compact('datacustomer'));
	}

	function create(){
		return view('customer.create');
	}

	function store(Request $request){
		Customer::create([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'detail' => $request->detail,
			]);

		return redirect('customer');
	}

	function edit($id){
		$data = Customer::find($id);
		return view('customer.edit', compact('data'));
	}

	function update(Request $request, $id){
		Customer::find($id)->update([
			'name' => $request->name,
			'address' => $request->address,
			'phone' => $request->phone,
			'detail' => $request->detail,
			]);

		return redirect('customer');
	}

	function delete($id){
		Customer::destroy($id);
		return redirect('customer');
	}
}
