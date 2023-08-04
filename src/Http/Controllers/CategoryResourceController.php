<?php

namespace Litecms\Block\Http\Controllers;

use Exception;
use Litecms\Block\Actions\CategoryAction;
use Litecms\Block\Actions\CategoryActions;
use Litecms\Block\Forms\Category as CategoryForm;
use Litecms\Block\Http\Requests\CategoryResourceRequest;
use Litecms\Block\Http\Resources\CategoriesCollection;
use Litecms\Block\Http\Resources\CategoryResource;
use Litecms\Block\Models\Category;
use Litepie\Http\Controllers\ResourceController as BaseController;

/**
 * Resource controller class for category.
 */
class CategoryResourceController extends BaseController
{

    /**
     * Initialize category resource controller.
     *
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->form = CategoryForm::only('main')
                ->setAttributes()
                ->toArray();
            $this->modules = $this->modules(config('litecms.block.modules'), 'block', guard_url('block'));
            return $next($request);
        });
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function index(CategoryResourceRequest $request)
    {
        $request = $request->all();
        $page = CategoryActions::run('paginate', $request);

        $data = new CategoriesCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('block::category.names'))
            ->view('block::category.index')
            ->data(compact('data', 'modules', 'form'))
            ->output();

    }

    /**
     * Display category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function show(CategoryResourceRequest $request, Category $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new CategoryResource($model);
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('block::category.name'))
            ->data(compact('data', 'form', 'modules'))
            ->view('block::category.show')
            ->output();
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryResourceRequest $request, Category $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new CategoryResource($model);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('block::category.name'))
            ->view('block::category.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryResourceRequest $request, Category $model)
    {
        try {
            $request = $request->all();
            $model = CategoryAction::run('store', $model, $request);
            $data = new CategoryResource($model);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('block/category/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/block/category'))
                ->redirect();
        }

    }

    /**
     * Show category for editing.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function edit(CategoryResourceRequest $request, Category $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new CategoryResource($model);
        // return view('block::category.edit', compact('data', 'form', 'modules'));

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('block::category.name'))
            ->view('block::category.edit')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Update the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function update(CategoryResourceRequest $request, Category $model)
    {
        try {
            $request = $request->all();
            $model = CategoryAction::run('update', $model, $request);
            $data = new CategoryResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/category/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category/' . $model->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function destroy(CategoryResourceRequest $request, Category $model)
    {
        try {

            $request = $request->all();
            $model = CategoryAction::run('destroy', $model, $request);
            $data = new CategoryResource($model);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::category.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/category/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category/' . $model->getRouteKey()))
                ->redirect();
        }

    }
}
