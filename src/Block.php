<?php

namespace Litecms\Block;

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
     * take latest blocks for public side
     * @param type $count
     * @param type|string $view
     * @return type
     */

    public function display($category)
    {

        $view = (view()->exists("block::public.{$category}")) ? "block::public.{$category}" : "block::public.default";

        $category = $this->category
            ->scopeQuery(function ($query) use ($category) {
                return $query->with('blocks')->whereSlug($category);
            })->first();

        $blocks = $category->blocks;
        return view($view, compact('blocks', 'category'))->render();
    }
}
