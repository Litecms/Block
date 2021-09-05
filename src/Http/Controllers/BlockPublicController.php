<?php

namespace Litecms\Block\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use App\Http\Requests\PublicRequest;
use Litecms\Block\Interfaces\BlockRepositoryInterface;
use Litecms\Block\Repositories\Eloquent\Presenters\BlockListPresenter;
use Litecms\Block\Repositories\Eloquent\Filters\BlockPublicFilter;
use Litepie\Repository\Filter\RequestFilter;

class BlockPublicController extends BaseController
{

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct(BlockRepositoryInterface $block)
    {
        parent::__construct();
        $this->modules = $this->modules(config('litecms.block.modules'), 'block', guard_url('block'));
        $this->repository = $block;

    }

    /**
     * Show block's list.
     *
     * @return response
     */
    protected function index(PublicRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $data = $this->repository
            ->pushFilter(RequestFilter::class)
            ->pushFilter(BlockPublicFilter::class)
            ->setPresenter(BlockListPresenter::class)
            ->paginate($pageLimit)
            // ->withQueryString()
            ->toArray();

        extract($data);
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('block::block.names'))
            ->view('block::public.block.index')
            ->data(compact('data', 'meta', 'modules'))
            ->output();
    }


    /**
     * Show block.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(PublicRequest $request, $slug)
    {
        $data = $this->repository
            ->findBySlug($slug)
            ->toArray();
        $modules = $this->modules;

        return $this->response->setMetaTitle($data['name'] . trans('block::block.name'))
            ->view('block::public.block.show')
            ->data(compact('data', 'modules'))
            ->output();
    }

}