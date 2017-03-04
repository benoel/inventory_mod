<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('customers')->truncate();
        
        foreach ((range(1, 15)) as $index) {
          $price = $faker->numberBetween($min = 10000, $max = 450000);

          DB::table('customers')->insert([
            'name'    => $faker->unique()->name(),
            'address' => $faker->unique()->address(),
            'phone'   => $faker->unique()->e164PhoneNumber(),
          ]);
        }
    }
}
