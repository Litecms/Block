<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package' => 'block',

    /*
     * Modules.
     */
    'modules' => ['block', 'category'],

    'block' => [
        'model' => [
            'model' => \Litecms\Block\Models\Block::class,
            'table' => 'blocks',
            'hidden' => [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'createdat', 'updated_at'],
            'appends' => [],
            'fillable' => [
                'id', 'category_id', 'name', 'url', 'icon', 'order', 'description', 'image', 
                'images', 'slug', 'status', 'user_id', 'user_type', 'upload_folder', 
                'deleted_at', 'created_at', 'updated_at'
            ],
            'translatables' => [],
            'upload_folder' => 'block/block',
            'uploads' => [
                'images' => [
                    'count' => 10,
                    'type' => 'image',
                ],
                'image' => [
                    'count' => 1,
                    'type' => 'image',
                ],
            ],

            'casts' => [
                'images' => 'array',
                'image' => 'array',
            ],

            'revision' => [],
            'perPage' => '20',
            'search' => [
                'name' => 'like',
                'status',
            ],
        ],

        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Block',
            'module' => 'Block',
        ],
    ],
    'category' => [
        'model' => [
            'model' => \Litecms\Block\Models\Category::class,
            'table' => 'block_categories',
            'hidden' => [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'createdat', 'updated_at'],
            'appends' => [],
            'fillable' => ['id', 'name', 'slug', 'title', 'details', 'image', 'status', 'user_type', 'user_id', 'upload_folder', 'deleted_at', 'created_at', 'updated_at'],
            'translatables' => [],
            'upload_folder' => 'block/category',
            'uploads' => [
                /*
            'images' => [
            'count' => 10,
            'type'  => 'image',
            ],
            'file' => [
            'count' => 1,
            'type'  => 'file',
            ],
             */
            ],

            'casts' => [
                /*
            'images'    => 'array',
            'file'      => 'array',
             */
            ],

            'revision' => [],
            'perPage' => '20',
            'search' => [
                'name' => 'like',
                'status',
            ],
        ],

        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Block',
            'module' => 'Category',
        ],
    ],
];
