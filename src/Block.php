<?php

namespace Litecms\Block;

class Block
{
    /**
     * Category repository object.
     */
    protected $category;

    /**
     * Block repository object.
     */
    protected $block;

    /**
     * Constructor.
     */
    public function __construct(
        \Litecms\Block\Interfaces\CategoryRepositoryInterface $category,
        \Litecms\Block\Interfaces\BlockRepositoryInterface $block
    ) {
        $this->category = $category;
        $this->block = $block;
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

    /**
     * take latest blocks for public side
     * @param type $count
     * @param type|string $view
     * @return type
     */

    public function categoryOptions($key, $value)
    {
        return $this->category
            ->resetRepository()
            ->options($key, $value);
    }
}
