<?php

namespace Database\Seeders;

use App\Models\Contect;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'test',
            "email"=>'test@gmail.com',
            'password'=>bcrypt('password')
        ]);

        Contect::create([
            'user_id'=>1,
            'phone'=>'9876543210',
            'address'=>'test'
        ]);
    }
}
