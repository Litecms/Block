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
        \Litecms\Block\Interfaces\BlockRepositoryInterface $block) {
        $this->category = $category;
        $this->block = $block;
    }

    /**
     * Returns count of blog or category.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count($module)
    {

        if (User::hasRole('user')) {
            $this->block->pushCriteria(new \Litecms\Block\Repositories\Criteria\BlockUserCriteria());
        }

        if ($module == 'block') {
            return $this->block
                ->scopeQuery(function ($query) {
                    return $query;
                })
                ->count();
        }

        if ($module == 'category') {
            return $this->category
                ->scopeQuery(function ($query) {
                    return $query;
                })->count();
        }

        if ($module == 'public') {
            return $this->block
                ->pushCriteria(new \Litecms\Block\Repositories\Criteria\BlockPublicCriteria())
                ->scopeQuery(function ($query) {
                    return $query;
                })->count();
        }

    }

    /**
     * take block category
     * @return array
     */

    public function selectCategories()
    {
        $temp = [];
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

    /**
     * count of blogs by category
     * @param type $id
     * @return type
     */

    public function countBlocksCategory($id)
    {

        return $this->block

            ->countBlocksCategory($id);
    }

    public function getBlockCount($cid = null)
    {

        if (!empty($cid)) {
            return $this->block->pushCriteria(new \Litecms\Block\Repositories\Criteria\BlockPublicCriteria())
                ->scopeQuery(function ($query) use ($cid) {
                    return $query->orderBy('id', 'DESC')->whereCategoryId($cid);
                })->count();
        } else {
            return $this->block->pushCriteria(new \Litecms\Block\Repositories\Criteria\BlockPublicCriteria())
                ->scopeQuery(function ($query) use ($cid) {
                    return $query->orderBy('id', 'DESC');
                })->count();
        }

    }

}
