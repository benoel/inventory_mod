<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      DB::table('products')->truncate();

      foreach ((range(1, 150)) as $index) {
        $price = $faker->numberBetween($min = 10000, $max = 450000);

        DB::table('products')->insert([
          'name'        => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
          'barcode'     => $faker->unique()->ean13(),
          'category_id' => rand(1, 50),
          'unit'        => $faker->randomElement($array = array ('dus','karton','box', 'pcs')),
          'stock'       => rand(3, 155),
          'price_sale'  => $price
          ]);
      }
    }
  }
