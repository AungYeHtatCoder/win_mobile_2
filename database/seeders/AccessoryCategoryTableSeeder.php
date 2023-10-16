<?php

namespace Database\Seeders;

use App\Models\Admin\AccessoryCategories;
use Carbon\Carbon;
use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccessoryCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id'         => 1,
                'name'      => 'Cover',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'         => 2,
                'name'      => 'AirPod',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id'         => 3,
                'name'      => 'Head Phone',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'         => 4,
                'name'      => 'Power Bank',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'         => 5,
                'name'      => 'Watch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        AccessoryCategories::insert($categories);
    }
}