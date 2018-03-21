<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class BlockTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blocks')->insert([
            ['category_id'  => '1',
                'name'          => 'Powered by Laravel 5',
                'url'           => '',
                'icon'          => 'ti-stats-up',
                'order'         => '0',
                'description'   => 'We have tried to make use of all features of Laravel 5 which help you to develop the website with all resources available online.​ ',
                'image'         => '',
                'slug'          => 'powered-by-laravel-5-5',
                'status'        => 'show',
                'user_id'       => '1',
                'user_type'     => 'App\\User',
                'upload_folder' => '2016/07/21/104902202',
            ],
            ['category_id'  => '1',
                'name'          => 'Configure to your project',
                'url'           => '',
                'icon'          => 'ti-ruler-pencil',
                'order'         => '0',
                'description'   => 'Lavalite helps you to configure your Laravel projects easily. It acts as a bootstrapper for your Laravel Content Management System.',
                'image'         => '',
                'slug'          => 'configure-to-your-project',
                'status'        => 'show',
                'user_id'       => '1',
                'user_type'     => 'App\\User',
                'upload_folder' => '2016/07/21/104854884',
            ],
            ['category_id'  => '1',
                'name'          => 'Online package builder',
                'url'           => '',
                'icon'          => 'ti-package',
                'order'         => '0',
                'description'   => 'The online package builder helps you to build Lavalite packages easily, The downloaded package with basic required files help you to finish your projects quickly.',
                'image'         => '',
                'slug'          => 'online-package-builder',
                'status'        => 'show',
                'user_id'       => '1',
                'user_type'     => 'App\\User',
                'upload_folder' => '2016/07/21/104846403',
            ],
        ]);

        DB::table('block_categories')->insert([
            [
                'id'            => '1',
                'name'          => 'Features',
                'slug'          => 'features',
                'title'         => 'Packed with features you can\'t live without.',
                'details'       => 'Visit our <a href="https://lavalite.org/docs" target="_blank">documentation</a> for more information.',
                'status'        => 'show',
                'user_type'     => 'App\\User',
                'user_id'       => '1',
                'upload_folder' => '2016/10/31/163917964',
                'deleted_at'    => null,
                'created_at'    => '2016-07-20 07:17:48',
                'updated_at'    => '2016-11-01 13:08:17',
            ],
        ]);

        $id = DB::table('menus')->insertGetId([
            'parent_id' => 1,
            'key'       => null,
            'url'       => 'admin/block/block',
            'name'      => 'Blocks',
            'icon'      => 'fa fa-square',
            'target'    => null,
            'order'     => 100,
            'status'    => 1,
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'block.block.view',
                'name' => 'View Block',
            ],
            [
                'slug' => 'block.block.create',
                'name' => 'Create Block',
            ],
            [
                'slug' => 'block.block.edit',
                'name' => 'Update Block',
            ],
            [
                'slug' => 'block.block.delete',
                'name' => 'Delete Block',
            ],

            [
                'slug' => 'block.category.view',
                'name' => 'View Category',
            ],

            [
                'slug' => 'block.category.create',
                'name' => 'Create Category',
            ],
            [
                'slug' => 'block.category.edit',
                'name' => 'Update Category',
            ],
            [
                'slug' => 'block.category.delete',
                'name' => 'Delete Category',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'block.block.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}
