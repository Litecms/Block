<?php

namespace Litecms\Block\Repositories\Eloquent;

use Litecms\Block\Interfaces\BlockRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class BlockRepository extends BaseRepository implements BlockRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('litecms.block.block.search');
        return config('litecms.block.block.model');
    }
    /**
     * take block count based on category
     * @param type $id
     * @return type
     */

    public function countBlocksCategory($id)
    {

        return $this->model
            ->whereCategoryId($id)
            ->where('published', 'Yes')
            ->whereStatus('Show')
            ->count();
    }


    /**
     * take forum categories
     * @param type $category
     * @return type
     */

    public function categorys($category)
    {
        return $this->model
            ->whereCategoryId($category)
           
            ->orderBy('id', 'DESC')
            ->get();
    }
}
