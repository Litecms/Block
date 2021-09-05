<?php

namespace Litecms\Block\Repositories\Eloquent;

use Litecms\Block\Interfaces\CategoryRepositoryInterface;
use Litepie\Repository\BaseRepository;
use Litecms\Block\Repositories\Eloquent\Presenters\CategoryItemPresenter;


class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('litecms.page.page.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.block.category.model.model');
    }

    /**
     * Returns the default presenter if none is availabale.
     *
     * @return void
     */
    public function presenter()
    {
        return CategoryItemPresenter::class;
    }
}
