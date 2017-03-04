<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $guarded = [];
	public function costumer()
	{
		return $this->belongsTo('App\Costumer');
	}

	public function saledetails()
	{
		return $this->hasMany('App\SaleDetail');
	}
}
