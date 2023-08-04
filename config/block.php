<?php


return  
    [
        'model' => [
            'model' => \Litecms\Block\Models\Block::class,
            'table' => 'litecms_block_blocks',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'created_at', 'updated_at'],
            'appends' => [],
            'fillable' => ['name',  'url',  'category_id',  'icon',  'description',  'image',  'images',  'order',  'status',  'user_id',  'user_type'],
            'translatables' => [],
            'upload_folder' => 'block/block',
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
                "label" => 'block::block.label.name', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "url", 
                "type" => "text", 
                "label" => 'block::block.label.url', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "category_id", 
                "type" => "text", 
                "label" => 'block::block.label.category_id', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "icon", 
                "type" => "text", 
                "label" => 'block::block.label.icon', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "description", 
                "type" => "text", 
                "label" => 'block::block.label.description', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "image", 
                "type" => "text", 
                "label" => 'block::block.label.image', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "images", 
                "type" => "text", 
                "label" => 'block::block.label.images', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "order", 
                "type" => "text", 
                "label" => 'block::block.label.order', 
                'sort' => true,
                'roles' => [],
            ],
        ],

        'form' => [
            [
                "key" => 'name',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::block.label.name',
                "placeholder" => 'block::block.placeholder.name',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                "key" => 'url',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::block.label.url',
                "placeholder" => 'block::block.placeholder.url',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                "key" => 'category_id',
                "element" => 'select',
                "type" => 'model_select',
                "label" => 'block::block.label.category_id',
                "placeholder" => 'block::block.placeholder.category_id',
                "rules" => '',
                "options" => function(){
                    return trans('block::block.options.category_id');
                },
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                "key" => 'icon',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::block.label.icon',
                "placeholder" => 'block::block.placeholder.icon',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                "key" => 'description',
                "element" => 'text',
                "type" => 'text',
                "label" => 'block::block.label.description',
                "placeholder" => 'block::block.placeholder.description',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                "label" => 'block::block.label.image',
                "placeholder" => 'block::block.placeholder.image',
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
                "key" => 'images',
                "element" => 'file',
                "type" => 'images',
                "label" => 'block::block.label.images',
                "placeholder" => 'block::block.placeholder.images',
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
                "key" => 'order',
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => 'block::block.label.order',
                "placeholder" => 'block::block.placeholder.order',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "6",
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
                'url' => 'block/block/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'block/block/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'block/block',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'block/block',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'block/block',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'block/block',
                'method' => 'DELETE',
            ],
        ],
        'order' => [
            'created_at' => 'block::block.label.created_at',
            'name' => 'block::block.label.name',
            'status' => 'block::block.label.status',
        ],
        'groups' => [
            [
                'icon' => "mdi:account-supervisor-outline",
                'name' => "block::block.groups.main",
                'group' => "main.main",
                'title' => "block::block.groups.main",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::block.groups.details",
                'group' => "main.documents",
                'title' => "block::block.groups.details",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::block.groups.images",
                'group' => "main.documents",
                'title' => "block::block.groups.images",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::block.groups.settings",
                'group' => "main.documents",
                'title' => "block::block.groups.settings",
            ]
        ],
        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Block',
            'module' => 'Block',
        ],

        
        
    ];