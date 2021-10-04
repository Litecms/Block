<?php

namespace Litecms\Block\Forms;

use Litepie\Form\FormInterpreter;

class Category extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = [
            'new' => [
                'url' => guard_url('block/category/new'),
                'method' => 'GET',
            ],
            'create' => [
                'url' => guard_url('block/category/create'),
                'method' => 'GET',
            ],
            'store' => [
                'url' => guard_url('block/category'),
                'method' => 'POST',
            ],
            'update' => [
                'url' => guard_url('block/category'),
                'method' => 'PUT',
            ],
            'list' => [
                'url' => guard_url('block/category'),
                'method' => 'GET',
            ],
            'delete' => [
                'url' => guard_url('block/category'),
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
            ]
        ];
        self::$orderBy = [
            'created_at' => trans('blog::blog.label.created_at'),
            'name' => trans('blog::blog.label.title'),
            'status' => trans('blog::blog.label.status'),
        ];
        self::$groups = [
            'main' => trans('block::block.groups.main'),
            'details' => trans('block::block.groups.details'),
            'images' => trans('block::block.groups.images'),
            'settings' => trans('block::block.groups.settings'),
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
                "label" => trans('block::category.label.name'),
                "placeholder" => trans('block::category.placeholder.name'),
                "rules" => '',
                "group" => "main",
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
            'title' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('block::category.label.title'),
                "placeholder" => trans('block::category.placeholder.title'),
                "rules" => '',
                "group" => "main",
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
            'details' => [
                "element" => 'textarea',
                "type" => 'textarea',
                "label" => trans('block::category.label.details'),
                "placeholder" => trans('block::category.placeholder.details'),
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
            'image' => [
                "element" => 'file',
                "type" => 'image',
                "label" => trans('block::category.label.image'),
                "placeholder" => trans('block::category.placeholder.image'),
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
        ];

        return new static();
    }
}