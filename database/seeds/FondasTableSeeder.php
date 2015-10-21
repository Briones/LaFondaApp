<?php

use Illuminate\Database\Seeder;

class FondasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<100 ; $i++) {
            \DB::table('fondas')->insert(array(
                'name' => $faker->name,
                'address' => $faker->address,
                'postalcode' => $faker->postcode,
                'schedules' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ));
        }
    }
}
