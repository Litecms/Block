<?php

namespace Litecms\Block\Http\Controllers;

use Exception;
use Litecms\Block\Actions\BlockAction;
use Litecms\Block\Actions\BlockActions;
use Litecms\Block\Forms\Block as BlockForm;
use Litecms\Block\Http\Requests\BlockResourceRequest;
use Litecms\Block\Http\Resources\BlockResource;
use Litecms\Block\Http\Resources\BlocksCollection;
use Litecms\Block\Models\Block;
use Litepie\Http\Controllers\ResourceController as BaseController;

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
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->form = BlockForm::only('main')
                ->setAttributes()
                ->toArray();
            $this->modules = $this->modules(config('litecms.block.modules'), 'block', guard_url('block'));
            return $next($request);
        });
    }

    /**
     * Display a list of block.
     *
     * @return Response
     */
    public function index(BlockResourceRequest $request)
    {
        $request = $request->all();
        $page = BlockActions::run('paginate', $request);

        $data = new BlocksCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('block::block.names'))
            ->view('block::block.index')
            ->data(compact('data', 'modules', 'form'))
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
    public function show(BlockResourceRequest $request, Block $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new BlockResource($model);
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('block::block.name'))
            ->data(compact('data', 'form', 'modules'))
            ->view('block::block.show')
            ->output();
    }

    /**
     * Show the form for creating a new block.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(BlockResourceRequest $request, Block $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new BlockResource($model);
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
    public function store(BlockResourceRequest $request, Block $model)
    {
        try {
            $request = $request->all();
            $model = BlockAction::run('store', $model, $request);
            $data = new BlockResource($model);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('block/block/' . $model->getRouteKey()))
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
    public function edit(BlockResourceRequest $request, Block $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new BlockResource($model);
        // return view('block::block.edit', compact('data', 'form', 'modules'));

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
    public function update(BlockResourceRequest $request, Block $model)
    {
        try {
            $request = $request->all();
            $model = BlockAction::run('update', $model, $request);
            $data = new BlockResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/block/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $model->getRouteKey()))
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
    public function destroy(BlockResourceRequest $request, Block $model)
    {
        try {

            $request = $request->all();
            $model = BlockAction::run('destroy', $model, $request);
            $data = new BlockResource($model);

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
                ->url(guard_url('block/block/' . $model->getRouteKey()))
                ->redirect();
        }

    }
}
