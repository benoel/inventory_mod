<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('categories')->truncate();
        
        foreach ((range(1, 50)) as $index) {
          DB::table('categories')->insert([
            'name' => $faker->colorName()
            ]);
      }
  }
}
