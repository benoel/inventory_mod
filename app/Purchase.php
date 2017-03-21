<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $guarded = [];
	
  public function supplier()
	{
		return $this->belongsTo('App\Supplier');
	}

	public function purchasedetails()
	{
		return $this->hasMany('App\PurchaseDetail','purchase_number','purchase_number');
	}
}
