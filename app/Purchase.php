<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $guarded = [];
	public function suplier()
	{
		return $this->belongsTo('App\Suplier');
	}

	public function purchasedetails()
	{
		return $this->hasMany('App\PurchaseDetail');
	}
}
