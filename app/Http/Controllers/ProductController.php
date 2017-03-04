<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class ProductController extends Controller
{

	function view(){
		$dataproduct = Product::all();
		return view('product.view', compact('dataproduct'));
	}

	function create(){
		$category = Category::all();
		return view('product.create', compact('category'));
	}

	function store(Request $request){
		Product::create([
			'name' => $request->name,
			'unit' => $request->unit,
			'stock' => $request->stock,
			'price_sale' => $request->price_sale,
			'price_buy' => $request->price_buy,
			'price_buy' => $request->price_buy,
			'category_id' => $request->category_id,
			]);

		return redirect('product');
	}

	function edit($id){
		$category = Category::all();
		$data = Product::find($id);
		return view('product.edit', compact('category', 'data'));
	}

	function update(Request $request, $id){
		Product::find($id)->update([
			'name' => $request->name,
			'unit' => $request->unit,
			'stock' => $request->stock,
			'price_sale' => $request->price_sale,
			'price_buy' => $request->price_buy,
			'price_buy' => $request->price_buy,
			'category_id' => $request->category_id,
			]);

		return redirect('product');
	}

	function delete($id){
		Product::destroy($id);
		return redirect('product');
	}


}
