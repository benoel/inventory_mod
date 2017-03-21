<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
	protected $guarded = [];
	public function purchase()
	{
		return $this->belongsTo('App\Purchase', 'purchase_number');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
