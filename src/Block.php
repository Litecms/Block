<?php

namespace Litecms\Block;

use Litecms\Block\Actions\BlockActions;
use Litecms\Block\Actions\CategoryActions;

class Block
{
    /**
     * Return select options block for the module.
     *
     * @param string $module
     * @param array $request
     *
     * @return array
     */
    public function options($module = 'block', $request = []) :array
    {
        if ($module == 'block') {
            return BlockActions::run('options', $request);
        }

        if ($module == 'category') {
            return CategoryActions::run('options', $request);
        }

        return [];

    }
}