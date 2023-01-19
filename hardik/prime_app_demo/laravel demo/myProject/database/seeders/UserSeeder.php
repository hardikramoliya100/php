<?php

namespace Database\Seeders;

use App\Models\Contect;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // for ($i = 0; $i < 15; $i++) {
        //     # code...
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => Hash::make('password'),
        //     ]);
        // }

        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Contect::create([
            'user_id'=>1,
            'phone_no'=>'9087654321',
            'address'=>'Address'
        ]);
    }
}
