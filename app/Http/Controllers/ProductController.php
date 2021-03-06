<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Supplier;

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
			'barcode' => $request->barcode,
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
			'barcode' => $request->barcode,
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

	function purchase($barcode,$supplier,$type)
	{
		$product = Product::where('barcode',$barcode)->first();
		$price = '';
		$quantity = 1;

		if($product != null){
			$productid = $product->id;
			$productname = $product->name;
			$supp = Supplier::find($supplier)
			->products()->select('name')
			->where('barcode',$barcode)
			->wherePivot('type',$type)
			->first();

			if($supp != null) {
				$price = $supp->pivot->price;
			}

			return response(compact(
				'productid',
				'productname',
				'price',
				'quantity',
				'barcode'
				));
		}else{
			return 'noproduct';
		}
	}

	function checkproduct($barcode){
		$product = Product::where('barcode', $barcode)->first();
		if ($product != null) {
			if ($product->stock != 0) {
				$productid = $product->id;
				$productname = $product->name;
				$price = $product->price_sale;
				$stock = $product->stock;
				$barcode = $product->barcode;

				return response(compact(
					'productid',
					'productname',
					'price',
					'stock',
					'barcode'
					));
			}else{
				return "nostock";
			}
		}else{
			return 'noproduct';
		}
	}
}
