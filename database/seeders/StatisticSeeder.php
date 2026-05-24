<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statistics = [
            [
                'key' => 'years',
                'label' => 'Years Experience',
                'value' => 30,
                'order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'products',
                'label' => 'Products',
                'value' => 400,
                'order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'solutions',
                'label' => 'Product Solution',
                'value' => 300,
                'order' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'support',
                'label' => 'Support',
                'value' => 50,
                'order' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('statistics')->insert($statistics);
    }
}

