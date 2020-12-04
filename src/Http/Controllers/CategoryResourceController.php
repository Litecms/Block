<?php

namespace Litecms\Block\Http\Controllers;

use Litepie\Http\Controllers\ResourceController;
use Litecms\Block\Http\Requests\CategoryRequest;
use Litecms\Block\Interfaces\CategoryRepositoryInterface;
use Litecms\Block\Models\Category;

/**
 * Resource controller class for category.
 */
class CategoryResourceController extends ResourceController
{

    /**
     * Initialize category resource controller.
     *
     * @param type CategoryRepositoryInterface $category
     *
     * @return null
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Block\Repositories\Criteria\CategoryResourceCriteria::class);
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function index(CategoryRequest $request)
    {
        $pageLimit = $request->input('pageLimit', 10);
        $data = $this->repository
            ->setPresenter(\Litecms\Block\Repositories\Presenter\CategoryListPresenter::class)
            ->paginate($pageLimit);
        extract($data);
        $view = 'block::category.index';
        if ($request->ajax()) {
            $view = 'block::category.more';
        }
        return $this->response->setMetaTitle(trans('block::category.names'))
            ->view($view)
            ->data(compact('data', 'meta'))
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
    public function show(CategoryRequest $request, Category $category)
    {

        if ($category->exists) {
            $view = 'block::category.show';
        } else {
            $view = 'block::category.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('block::category.name'))
            ->data(compact('category'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryRequest $request)
    {

        $category = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('block::category.name')) 
            ->view('block::category.create') 
            ->data(compact('category'))
            ->output();
    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $category                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('block/category/' . $category->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category'))
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
    public function edit(CategoryRequest $request, Category $category)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('block::category.name'))
            ->view('block::category.edit')
            ->data(compact('category'))
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
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $attributes = $request->all();

            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('block/category/' . $category->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category/' . $category->getRouteKey()))
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
    public function destroy(CategoryRequest $request, Category $category)
    {
        try {

            $category->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::category.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('block/category/' . $category->getRouteKey()))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category/' . $category->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function delete(CategoryRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('block::category.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('block/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('block/category'))
                ->redirect();
        }

    }

    /**
     * Restore deleted categories.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function restore(CategoryRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('block::category.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('block/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('block/category/'))
                ->redirect();
        }

    }

}
