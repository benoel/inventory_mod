<?php

use Illuminate\Database\Seeder;

class ProductSuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	DB::table('product_suppliers')->truncate();
    	foreach ((range(1, 15)) as $index) {
    		$price = $faker->numberBetween($min = 10000, $max = 450000);

    		DB::table('product_suppliers')->insert([
    			'product_id'    => rand(1,150),
    			'supplier_id' => rand(1,15),
    			'type' => $faker->randomElement($array = array ('pickup','deliver')),
    			'price' => $price
    			]);
    	}
    }
}
