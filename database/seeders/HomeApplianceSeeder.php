<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeApplianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home-appliance')->insert(
            [
                'name' => 'Geladeira Frost Free',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir',
                'voltage' => '220v',
                'brand_id' => 1
            ],
         );
    }
}
