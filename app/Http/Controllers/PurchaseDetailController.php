<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseDetail;

class PurchaseDetailController extends Controller
{
  function store(Request $request)
  {
    PurchaseDetail::create([
      'purchase_number' => $request->purNumber,
      'product_id' => $request->proId,
      'price' => $request->price,
      'total' => $request->price,
    ]);

    return 'success';
  }

  function update(Request $request)
  {
    PurchaseDetail::where([
      ['purchase_number', $request->purNumber],
      ['product_id', $request->proId],
    ])->update([
      'quantity' => $request->quantity,
      'price'    => $request->price,
      'total'    => $request->total
    ]);

    return 'success';
  }

  function delete($purchase_number, $id){
    PurchaseDetail::where('purchase_number', $purchase_number)
      ->where('product_id', $id)
      ->delete();

    return 'success';
  }
}
