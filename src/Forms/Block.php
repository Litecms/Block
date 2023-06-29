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

        self::$urls = config('litecms.block.block.urls');

        self::$search = config('litecms.block.block.search');

        self::$orderBy = config('litecms.block.block.order');

        self::$groups =  config('litecms.block.block.groups');

        self::$list =  config('litecms.block.block.list');

        self::$fields = config('litecms.block.block.form');

        return new static();
    }
}
