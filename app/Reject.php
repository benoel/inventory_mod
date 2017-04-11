<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
	protected $guarded = [];
	
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
