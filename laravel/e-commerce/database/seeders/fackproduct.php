<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class fackproduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            // 'title' => "lg",
            // 'discription' => "best tv",
            // 'category' => "tv",
            // 'price' => "230000",
            // 'gallery' => "https://images.app.goo.gl/Wzv97kLD6WafdiCC8"

            ]
        );
    }
}
