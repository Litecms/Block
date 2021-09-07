<?php

namespace Litecms\Block\Seeds;

use DB;
use Illuminate\Database\Seeder;

class BlockTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blocks')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'block.block.view',
                'name'      => 'View Block',
            ],
            [
                'slug'      => 'block.block.create',
                'name'      => 'Create Block',
            ],
            [
                'slug'      => 'block.block.edit',
                'name'      => 'Update Block',
            ],
            [
                'slug'      => 'block.block.delete',
                'name'      => 'Delete Block',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/block/block',
                'name'        => 'Block',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/block/block',
                'name'        => 'Block',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'block',
                'name'        => 'Block',
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
                'module'    => 'Block',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'block.block.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
