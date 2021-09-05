<?php

namespace Litecms\Block;

use User;

class Block
{
    /**
     * $category object.
     */
    protected $category;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Block\Interfaces\CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Returns count of block.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }
}
