<?php

namespace Database\Seeders;

use App\Models\Admin\Ram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneRAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rams = [
            [
                'id'         => '1',
                'name'      => '4 GB',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '2',
                'name'      => '6 GB',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '3',
                'name'      => '8 GB',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '4',
                'name'      => '12 GB',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
        ];
        Ram::insert($rams);
    }
}