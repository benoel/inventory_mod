<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function purchasedetails()
	{
		return $this->hasMany('App\PurchaseDetail');
	}

	public function saledetails()
	{
		return $this->hasMany('App\SaleDetail');
	}
}
