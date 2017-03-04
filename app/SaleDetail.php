<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
	protected $guarded = [];
	public function sale()
	{
		return $this->belongsTo('App\Sale');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
