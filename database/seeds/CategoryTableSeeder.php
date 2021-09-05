<?php

namespace Litecms\Block;

use DB;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'block.category.view',
                'name'      => 'View Category',
            ],
            [
                'slug'      => 'block.category.create',
                'name'      => 'Create Category',
            ],
            [
                'slug'      => 'block.category.edit',
                'name'      => 'Update Category',
            ],
            [
                'slug'      => 'block.category.delete',
                'name'      => 'Delete Category',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/block/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/block/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Block',
                'module'    => 'Category',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'block.category.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
