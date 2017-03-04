<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('purchases')->truncate();
        DB::table('purchase_details')->truncate();
        
        foreach ((range(1, 15)) as $index) {
          $price = $faker->numberBetween($min = 10000, $max = 450000);
          DB::table('purchases')->insert([
            'supplier_id' => $index,
            'total_price' => $faker->numberBetween($min = 1000000, $max = 45000000),
            'type'        => $faker->randomElement($array = array ('pickup','deliver'))
          ]);
        }

        foreach ((range(1, 15)) as $index) {
          foreach ((range(1, 8)) as $detail) {
            $price = $faker->numberBetween($min = 10000, $max = 450000);
            $quantity = rand(1, 5);
            DB::table('purchase_details')->insert([
              'purchase_id' => $index,
              'product_id'  => rand(1,150),
              'quantity'    => $quantity,
              'price'       => $price,
              'total'       => $price * $quantity
            ]);
          }
        }
    }
}
