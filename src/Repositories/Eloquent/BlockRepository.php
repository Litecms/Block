<?php

namespace Litecms\Block\Repositories\Eloquent;

use Litecms\Block\Interfaces\BlockRepositoryInterface;
use Litepie\Repository\BaseRepository;
use Litecms\Block\Repositories\Eloquent\Presenters\BlockItemPresenter;


class BlockRepository extends BaseRepository implements BlockRepositoryInterface
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
        return config('litecms.block.block.model.model');
    }

    /**
     * Returns the default presenter if none is availabale.
     *
     * @return void
     */
    public function presenter()
    {
        return BlockItemPresenter::class;
    }
}
