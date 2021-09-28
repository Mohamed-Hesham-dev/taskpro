<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cityData = [
            [
                'name'=>'Cairo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Assiut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Alex',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Menia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Qena',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Fayoum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Aswan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
        ];
        DB::table('gouvernes')->insert($cityData);
    }
}
