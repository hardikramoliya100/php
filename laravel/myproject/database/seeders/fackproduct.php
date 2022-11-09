<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use DB;


class fackproduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <15 ; $i++) { 
            
            DB::table('products')->insert([
                'titel' =>  $faker->name,
                'discription' =>  $faker->address,
                'price' => rand(10,1000),
                'quantity' => rand(10,100),
            ]);
        }
    }
}
