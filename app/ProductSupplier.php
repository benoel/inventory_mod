<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
	protected $guarded = [];

	public function suppliers()
	{
		return $this->belongsTo('App\Supplier');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
