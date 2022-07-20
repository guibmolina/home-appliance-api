<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand')->insert(
            ['name' => 'Electrolux'],
         );

         DB::table('brand')->insert(
            ['name' => 'Brastemp'],
         );

         DB::table('brand')->insert(
            ['name' => 'Fischer'],
         );

         DB::table('brand')->insert(
            ['name' => 'Samsung'],
         );

         DB::table('brand')->insert(
            ['name' => 'LG'],
         );
    }
}
