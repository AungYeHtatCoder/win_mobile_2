<?php

namespace Database\Seeders;

use App\Models\Admin\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'id'         => '1',
                'name'      => 'Black',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '2',
                'name'      => 'White',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '3',
                'name'      => 'Red',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '4',
                'name'      => 'Pink',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
        ];
        Color::insert($colors);
    }
}