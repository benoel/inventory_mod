<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailProductsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('sale_detail_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->smallInteger('quantity')->unsigned()->default(1);
            $table->mediumInteger('price')->unsigned()->nullable();
            $table->integer('total')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_detail_products');
    }
}
