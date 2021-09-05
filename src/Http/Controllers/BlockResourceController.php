<?php

namespace Litecms\Block\Http\Controllers;

use Exception;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litepie\Repository\Filter\RequestFilter;
use Litecms\Block\Forms\Block as BlockForm;
use Litecms\Block\Http\Requests\BlockRequest;
use Litecms\Block\Interfaces\BlockRepositoryInterface;
use Litecms\Block\Repositories\Eloquent\Filters\BlockResourceFilter;
use Litecms\Block\Repositories\Eloquent\Presenters\BlockListPresenter;

/**
 * Resource controller class for block.
 */
class BlockResourceController extends BaseController
{

    /**
     * Initialize block resource controller.
     *
     *
     * @return null
     */
    public function __construct(BlockRepositoryInterface $block)
    {
        parent::__construct();
        $this->form = BlockForm::setAttributes()->toArray();
        $this->modules = $this->modules(config('litecms.block.modules'), 'block', guard_url('block'));
        $this->repository = $block;
    }

    /**
     * Display a list of block.
     *
     * @return Response
     */
    public function index(BlockRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $data = $this->repository
            ->pushFilter(RequestFilter::class)
            ->pushFilter(BlockResourceFilter::class)
            ->setPresenter(BlockListPresenter::class)
            ->simplePaginate($pageLimit)
            // ->withQueryString()
            ->toArray();

        extract($data);
        $form = $this->form;
        $modules = $this->modules;
        return $this->response->setMetaTitle(trans('block::block.names'))
            ->view('block::block.index')
            ->data(compact('data', 'meta', 'links', 'modules', 'form'))
            ->output();
    }

    /**
     * Display block.
     *
     * @param Request $request
     * @param Model   $block
     *
     * @return Response
     */
    public function show(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('block::block.name'))
            ->data(compact('data', 'form', 'modules', 'form'))
            ->view('block::block.show')
            ->output();
    }

    /**
     * Show the form for creating a new block.
     *
     * @param Request $request
     *x
     * @return Response
     */
    public function create(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('block::block.name'))
            ->view('block::block.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();
    }

    /**
     * Create new block.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $repository->create($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('block/block/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/block/block'))
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
    public function edit(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('block::block.name'))
            ->view('block::block.edit')
            ->data(compact('data', 'form', 'modules'))
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
    public function update(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $repository->update($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/block/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $data['id']))
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
    public function destroy(BlockRequest $request, BlockRepositoryInterface $repository)
    {
        try {
            $repository->delete();
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::block.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/block/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $data['id']))
                ->redirect();
        }

    }
}
