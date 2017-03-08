<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;

class HomeController extends Controller
{
	function index(){
		return view('home');
	}

  function transaction($type){
    $products = Product::select('id','name')->get();

    if($type == 'beli'){
      $type = 'Pembelian';
    }elseif($type == 'jual'){
      $type = 'Penjualan';
    }

    return view('transaction', compact('type','products'));
  }

  function additem($barcode)
  {
    $product = Product::where('barcode',$barcode)
      ->select('id','name','price_sale')
      ->get();

    return response($product);
  }

  function testbarang($supplier,$barcode,$type){
    $supplier = Supplier::find($supplier)
      ->products()
      ->where('barcode',$barcode)
      ->wherePivot('type',$type)
      ->get();
      
    return response()->json($supplier);
  }
}
