<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetailProduct extends Model
{
	protected $guarded = [];
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
