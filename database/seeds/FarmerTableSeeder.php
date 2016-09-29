<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FarmerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('farmers')->insert([
	        	'key' => bcrypt('secret'),
	            'fullname' => $faker->name,
	            'email' => $faker->email,
	            'gender' => 'm',
	            'phone' => $faker->phoneNumber,
	            'state' => $faker->state,
	            'lga'=> $faker->state,
	            'village' => $faker->city,
	            'farm_size'=>$faker->randomNumber,
	            'no_of_pack'=>'2',
	            'used_before'=>'y',
	            'bank' =>$faker->word,
	            'account_no'=>$faker->randomNumber
	        ]);
        }
    }
}
