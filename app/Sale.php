<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $guarded = [];
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	public function saledetails()
	{
		return $this->hasMany('App\SaleDetail');
	}
}
