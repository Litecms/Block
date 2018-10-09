<?php

namespace Litecms\Block;

use User;
use View;

class Block
{
    /**
     * $category object.
     */
    protected $category;
    /**
     * $block object.
     */
    protected $block;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Block\Interfaces\CategoryRepositoryInterface $category,
        \Litecms\Block\Interfaces\BlockRepositoryInterface                                $block) {
        $this->category = $category;
        $this->block    = $block;
    }


    /**
     * take block category
     * @return array
     */

    public function selectCategories()
    {
        $temp     = [];
        $category = $this->category->scopeQuery(function ($query) {
            return $query->whereStatus('Show')->orderBy('name', 'ASC');
        })->all();

        foreach ($category as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;
    }

    /**
     * take latest blocks for public side
     * @param type $count
     * @param type|string $view
     * @return type
     */

    public function display($category)
    {

        $view = (View::exists("block::{$category}")) ? "block::{$category}" : "block::default";

        $category = $this->category
            ->scopeQuery(function ($query) use ($category) {
                return $query->with('blocks')->whereSlug($category);
            })->first();

        $blocks = $category->blocks;
        return view($view, compact('blocks', 'category'))->render();
    }


}
