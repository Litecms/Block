<?php

namespace Litecms\Block\Http\Controllers;

use Litepie\Http\Controllers\ResourceController;
use Litecms\Block\Http\Requests\BlockRequest;
use Litecms\Block\Interfaces\BlockRepositoryInterface;
use Litecms\Block\Models\Block;

/**
 * Resource controller class for block.
 */
class BlockResourceController extends ResourceController
{

    /**
     * Initialize block resource controller.
     *
     * @param type BlockRepositoryInterface $block
     *
     * @return null
     */
    public function __construct(BlockRepositoryInterface $block)
    {
        parent::__construct();
        $this->repository = $block;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Block\Repositories\Criteria\BlockResourceCriteria::class);
    }

    /**
     * Display a list of block.
     *
     * @return Response
     */
    public function index(BlockRequest $request)
    {
        $pageLimit = $request->input('pageLimit', 10);
        $data = $this->repository
            ->setPresenter(\Litecms\Block\Repositories\Presenter\BlockListPresenter::class)
            ->paginate($pageLimit);
        extract($data);
        $view = 'block::block.index';
        if ($request->ajax()) {
            $view = 'block::block.more';
        }
        return $this->response->setMetaTitle(trans('block::block.names'))
            ->view($view)
            ->data(compact('data', 'meta'))
            ->output();

        // if ($this->response->typeIs('json')) {
        //     $pageLimit = $request->input('pageLimit');
        //     $data      = $this->repository
        //         ->setPresenter(\Litecms\Block\Repositories\Presenter\BlockListPresenter::class)
        //         ->getDataTable($pageLimit);
        //     return $this->response
        //         ->data($data)
        //         ->output();
        // }

        // $blocks = $this->repository->paginate();

        // return $this->response->setMetaTitle(trans('block::block.names'))
        //     ->view('block::block.index')
        //     ->data(compact('blocks'))
        //     ->output();
    }

    /**
     * Display block.
     *
     * @param Request $request
     * @param Model   $block
     *
     * @return Response
     */
    public function show(BlockRequest $request, Block $block)
    {

        if ($block->exists) {
            $view = 'block::block.show';
        } else {
            $view = 'block::block.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('block::block.name'))
            ->data(compact('block'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new block.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(BlockRequest $request)
    {

        $block = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('block::block.name')) 
            ->view('block::block.create') 
            ->data(compact('block'))
            ->output();
    }

    /**
     * Create new block.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(BlockRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $block                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block'))
                ->redirect();
        }

    }

    /**
     * Show block for editing.
     *
     * @param Request $request
     * @param Model   $block
     *
     * @return Response
     */
    public function edit(BlockRequest $request, Block $block)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('block::block.name'))
            ->view('block::block.edit')
            ->data(compact('block'))
            ->output();
    }

    /**
     * Update the block.
     *
     * @param Request $request
     * @param Model   $block
     *
     * @return Response
     */
    public function update(BlockRequest $request, Block $block)
    {
        try {
            $attributes = $request->all();

            $block->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the block.
     *
     * @param Model   $block
     *
     * @return Response
     */
    public function destroy(BlockRequest $request, Block $block)
    {
        try {

            $block->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::block.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('block/block/'. $block->getRouteKey()))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple block.
     *
     * @param Model   $block
     *
     * @return Response
     */
    public function delete(BlockRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::block.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('block/block'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('block/block'))
                ->redirect();
        }

    }

    /**
     * Restore deleted blocks.
     *
     * @param Model   $block
     *
     * @return Response
     */
    public function restore(BlockRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('block::block.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('block/block'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('block/block/'))
                ->redirect();
        }

    }

}