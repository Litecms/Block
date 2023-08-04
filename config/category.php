<?php


return  
    [
        'model' => [
            'model' => \Litecms\Block\Models\Category::class,
            'table' => 'litecms_block_categories',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'created_at', 'updated_at'],
            'appends' => [],
            'fillable' => ['name',  'title',  'details',  'image',  'status',  'user_type',  'user_id'],
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
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'search' => [
            
        ],

        'list' => [
            [
                "key" => "name", 
                "type" => "text", 
                "label" => 'block::category.label.name', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "title", 
                "type" => "text", 
                "label" => 'block::category.label.title', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "details", 
                "type" => "text", 
                "label" => 'block::category.label.details', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "image", 
                "type" => "text", 
                "label" => 'block::category.label.image', 
                'sort' => true,
                'roles' => [],
            ],
        ],

        'form' => [
            [
                "key" => 'name',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::category.label.name',
                "placeholder" => 'block::category.placeholder.name',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'title',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::category.label.title',
                "placeholder" => 'block::category.placeholder.title',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'details',
                "element" => 'html_editor',
                "type" => 'html_editor',
                "label" => 'block::category.label.details',
                "placeholder" => 'block::category.placeholder.details',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'image',
                "element" => 'file',
                "type" => 'image',
                "label" => 'block::category.label.image',
                "placeholder" => 'block::category.placeholder.image',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
        ],

        'urls' => [
            'new' => [
                'url' => 'block/category/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'block/category/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'block/category',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'block/category',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'block/category',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'block/category',
                'method' => 'DELETE',
            ],
        ],
        'order' => [
            'created_at' => 'block::category.label.created_at',
            'name' => 'block::category.label.name',
            'status' => 'block::category.label.status',
        ],
        'groups' => [
            [
                'icon' => "mdi:account-supervisor-outline",
                'name' => "block::category.groups.main",
                'group' => "main.main",
                'title' => "block::category.groups.main",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.details",
                'group' => "main.documents",
                'title' => "block::category.groups.details",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.images",
                'group' => "main.documents",
                'title' => "block::category.groups.images",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.settings",
                'group' => "main.documents",
                'title' => "block::category.groups.settings",
            ]
        ],
        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Block',
            'module' => 'Category',
        ],

        
        
    ];