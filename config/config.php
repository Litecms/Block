<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litepie',

    /*
     * Package.
     */
    'package'  => 'block',

    /*
     * Modules.
     */
    'modules'  => [
        'category',
        'block',
    ],

    /*
     * Image size.
     */
    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

    ],

    'category' => [
        'model'         => 'Litecms\Block\Models\Category',
        'table'         => 'block_categories',
        'presenter'     => \Litecms\Block\Repositories\Presenter\CategoryItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'user_type', 'name', 'slug', 'title', 'details', 'status', 'upload_folder'],
        'translatables' => [],

        'upload_folder' => '/block/category',
        'uploads'       => [],
        'casts'         => [],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
    'block'    => [
        'model'         => 'Litecms\Block\Models\Block',
        'table'         => 'blocks',
        'presenter'     => \Litecms\Block\Repositories\Presenter\BlockItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'user_type', 'category_id', 'name', 'url', 'icon', 'order', 'description', 'status', 'image', 'images', 'upload_folder'],
        'translatables' => [],

        'upload_config' => 'block.block',
        'upload_folder' => 'block/block',
        'uploads'       => [
            'image'  => [
                'count' => 1,
                'type'  => 'image',
            ],
            'images' => [
                'count' => 10,
                'type'  => 'image',
            ],
        ],
        'casts'         => [
            'image'  => 'array',
            'images' => 'array',
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
];
