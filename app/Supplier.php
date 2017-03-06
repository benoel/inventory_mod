<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $guarded = [];
	public function purchase()
	{
		return $this->hasMany('App\Purchase');
	}

	public function product_suppliers()
	{
		return $this->hasMany('App\ProductSupplier');
	}

	// public function products()
	// {
	// 	return $this->belongsToMany('App\Product');
	// }


}
