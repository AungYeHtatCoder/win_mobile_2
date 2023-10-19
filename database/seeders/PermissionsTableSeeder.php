<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'permission_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '6',
                'title'      => 'role_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '7',
                'title'      => 'role_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '8',
                'title'      => 'role_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '9',
                'title'      => 'role_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '10',
                'title'      => 'role_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '11',
                'title'      => 'user_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '17',
                'title'      => 'banner_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '18',
                'title'      => 'banner_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '19',
                'title'      => 'banner_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '20',
                'title'      => 'banner_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '21',
                'title'      => 'banner_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '22',
                'title'      => 'banner_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '23',
                'title'      => 'category_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '24',
                'title'      => 'category_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '25',
                'title'      => 'category_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '26',
                'title'      => 'category_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '27',
                'title'      => 'category_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '28',
                'title'      => 'category_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '29',
                'title'      => 'accessory_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '30',
                'title'      => 'accessory_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '31',
                'title'      => 'accessory_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '32',
                'title'      => 'accessory_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '33',
                'title'      => 'accessory_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '34',
                'title'      => 'accessory_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],

            [
                'id'         => '35',
                'title'      => 'accessory_category_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '36',
                'title'      => 'accessory_category_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '37',
                'title'      => 'accessory_category_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '38',
                'title'      => 'accessory_category_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '39',
                'title'      => 'accessory_category_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '40',
                'title'      => 'accessory_category_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


             [
                'id'         => '41',
                'title'      => 'color_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '42',
                'title'      => 'color_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '43',
                'title'      => 'color_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '44',
                'title'      => 'color_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '45',
                'title'      => 'color_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '46',
                'title'      => 'color_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '47',
                'title'      => 'brand_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '48',
                'title'      => 'brand_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '49',
                'title'      => 'brand_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '50',
                'title'      => 'brand_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '51',
                'title'      => 'brand_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '52',
                'title'      => 'brand_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],



            [
                'id'         => '53',
                'title'      => 'storage_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '54',
                'title'      => 'storage_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '55',
                'title'      => 'storage_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '56',
                'title'      => 'storage_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '57',
                'title'      => 'storage_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '58',
                'title'      => 'storage_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '59',
                'title'      => 'ram_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '60',
                'title'      => 'ram_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '61',
                'title'      => 'ram_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '62',
                'title'      => 'ram_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '63',
                'title'      => 'ram_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '64',
                'title'      => 'ram_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],


            [
                'id'         => '65',
                'title'      => 'product_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '66',
                'title'      => 'product_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '67',
                'title'      => 'product_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '68',
                'title'      => 'product_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '69',
                'title'      => 'product_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '70',
                'title'      => 'product_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],

            [
                'id'         => '71',
                'title'      => 'pending_order_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '72',
                'title'      => 'pending_order_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '73',
                'title'      => 'pending_order_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '74',
                'title'      => 'pending_order_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '75',
                'title'      => 'pending_order_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '76',
                'title'      => 'pending_order_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],

            [
                'id'         => '77',
                'title'      => 'delivering_order_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '78',
                'title'      => 'delivering_order_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '79',
                'title'      => 'delivering_order_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '80',
                'title'      => 'delivering_order_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '81',
                'title'      => 'delivering_order_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '82',
                'title'      => 'delivering_order_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '83',
                'title'      => 'complete_order_management_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '84',
                'title'      => 'complete_order_create',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '85',
                'title'      => 'complete_order_edit',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '86',
                'title'      => 'complete_order_show',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '87',
                'title'      => 'complete_order_delete',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],
            [
                'id'         => '89',
                'title'      => 'complete_order_access',
                'created_at' => '2023-02-10 14:00:26',
                'updated_at' => '2023-02-10 14:00:26',
            ],



        ];

        Permission::insert($permissions);
    
    }
}