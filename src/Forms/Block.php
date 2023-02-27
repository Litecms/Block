<?php

namespace Litecms\Block\Forms;

use Litepie\Form\FormInterpreter;

class Block extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = [
            'new' => [
                'url' => guard_url('block/block/new'),
                'method' => 'GET',
            ],
            'create' => [
                'url' => guard_url('block/block/create'),
                'method' => 'GET',
            ],
            'store' => [
                'url' => guard_url('block/block'),
                'method' => 'POST',
            ],
            'update' => [
                'url' => guard_url('block/block'),
                'method' => 'PUT',
            ],
            'list' => [
                'url' => guard_url('block/block'),
                'method' => 'GET',
            ],
            'delete' => [
                'url' => guard_url('block/block'),
                'method' => 'DELETE',
            ],
        ];
        self::$search = [
            'name' => [
                "type" => 'text',
                "label" => trans('block::block.label.name'),
                "placeholder" => trans('block::block.placeholder.name'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "4",
                "roles" => [],
            ],
        ];
        self::$groups = [
            'main' => trans('block::block.groups.main'),
            'details' => trans('block::block.groups.details'),
            'images' => trans('block::block.groups.images'),
        ];
        self::$orderBy = [
            'created_at' => trans('blog::blog.label.created_at'),
            'name' => trans('blog::blog.label.title'),
            'status' => trans('blog::blog.label.status'),
        ];
        self::$list = [
            [
                'key' => "ref",
                'label' => trans('block::block.label.ref'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "id",
                'label' => trans('block::block.label.id'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "name",
                'label' => trans('block::block.label.name'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "status",
                'label' => trans('block::block.label.status'),
                'sortable' => 'true',
                'roles' => [],
            ],
        ];
        self::$fields = [
            'name' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('block::block.label.name'),
                "placeholder" => trans('block::block.placeholder.name'),
                "rules" => '',
                "group" => "main",
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
            'icon' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('block::block.label.icon'),
                "placeholder" => trans('block::block.placeholder.icon'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'order' => [
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => trans('block::block.label.order'),
                "placeholder" => trans('block::block.placeholder.order'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'category_id' => [
                "element" => 'select',
                "type" => 'select',
                "label" => trans('block::block.label.category_id'),
                "placeholder" => trans('block::block.placeholder.category_id'),
                "rules" => '',
                "group" => "main",
                'options' => function () {
                    return \Block::categoryOptions('id', 'name');
                },
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'url' => [
                "element" => 'url',
                "type" => 'url',
                "label" => trans('block::block.label.url'),
                "placeholder" => trans('block::block.placeholder.url'),
                "rules" => '',
                "group" => "main",
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
            'description' => [
                "element" => 'html_editor',
                "type" => 'html_editor',
                "label" => trans('block::block.label.description'),
                "placeholder" => trans('block::block.placeholder.description'),
                "rules" => '',
                "group" => "details",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [
                        'class' => 'html-editor-mini',
                    ],

                ],
            ],
            'image' => [
                "element" => 'file',
                "type" => 'image',
                "label" => trans('block::block.label.image'),
                "placeholder" => trans('block::block.placeholder.image'),
                "rules" => '',
                "group" => "images",
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
            'images' => [
                "element" => 'file',
                "type" => 'images',
                "label" => trans('block::block.label.images'),
                "placeholder" => trans('block::block.placeholder.images'),
                "rules" => '',
                "group" => "images",
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
        ];

        return new static();
    }
}
