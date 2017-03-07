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

	public function products()
	{
		return $this->belongsToMany('App\Product','product_suppliers')->withPivot('type','price');
	}



}
