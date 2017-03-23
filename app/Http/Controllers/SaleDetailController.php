<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleDetail;

class SaleDetailController extends Controller
{
  function store(Request $request)
  {
    SaleDetail::create([
      'Sale_number' => $request->purNumber,
      'product_id' => $request->proId,
      'price' => $request->price,
      'total' => $request->price,
      ]);

    return 'success';
  }

  function update(Request $request)
  {
    SaleDetail::where([
      ['sale_number', $request->salNumber],
      ['product_id', $request->proId],
      ])->update([
      'quantity' => $request->quantity,
      'price'    => $request->price,
      'total'    => $request->total
      ]);

      return 'succes';
    }

    function delete($sale_number, $id){
      SaleDetail::where('sale_number', $sale_number)
      ->where('product_id', $id)
      ->delete();

      return 'success';
    }
  }
