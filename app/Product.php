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

	public function purchasedetailproducts()
	{
		return $this->hasMany('App\PurchaseDetailProduct');
	}

	public function saledetailproducts()
	{
		return $this->hasMany('App\SaleDetailProduct');
	}

	// public function productsupplier()
	// {
	// 	return $this->belongsToMany('App\Supplier', 'product_suppliers')->withPivot('type','price');
	// }

	public function suppliers()
	{
		return $this->belongsToMany('App\Supplier')->withPivot('type','price');
	}

}
