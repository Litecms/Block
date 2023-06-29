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

        self::$urls = config('litecms.block.category.urls');

        self::$search = config('litecms.block.category.search');

        self::$orderBy = config('litecms.block.category.order');

        self::$groups =  config('litecms.block.category.groups');

        self::$list =  config('litecms.block.category.list');

        self::$fields = config('litecms.block.category.form');

        return new static();
    }
}
