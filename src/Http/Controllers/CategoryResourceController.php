<?php

namespace Litecms\Block\Http\Controllers;

use Exception;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litepie\Repository\Filter\RequestFilter;
use Litecms\Block\Forms\Category as CategoryForm;
use Litecms\Block\Http\Requests\CategoryRequest;
use Litecms\Block\Interfaces\CategoryRepositoryInterface;
use Litecms\Block\Repositories\Eloquent\Filters\CategoryResourceFilter;
use Litecms\Block\Repositories\Eloquent\Presenters\CategoryListPresenter;

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
    public function __construct(CategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->form = CategoryForm::setAttributes()->toArray();
        $this->modules = $this->modules(config('litecms.block.modules'), 'block', guard_url('block'));
        $this->repository = $category;
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function index(CategoryRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $data = $this->repository
            ->pushFilter(RequestFilter::class)
            ->pushFilter(CategoryResourceFilter::class)
            ->setPresenter(CategoryListPresenter::class)
            ->simplePaginate($pageLimit)
            // ->withQueryString()
            ->toArray();

        extract($data);
        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('block::category.names'))
            ->view('block::category.index')
            ->data(compact('data', 'meta', 'links', 'modules', 'form'))
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
    public function show(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('block::category.name'))
            ->data(compact('data', 'form', 'modules', 'form'))
            ->view('block::category.show')
            ->output();
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *x
     * @return Response
     */
    public function create(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
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
    public function store(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $repository->create($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.created', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('block/category/' . $data['id']))
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
    public function edit(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();

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
    public function update(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $repository->update($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::category.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('block/category/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/category/' . $data['id']))
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
    public function destroy(CategoryRequest $request, CategoryRepositoryInterface $repository)
    {
        try {
            $repository->delete();
            $data = $repository->toArray();

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
                ->url(guard_url('block/category/' . $data['id']))
                ->redirect();
        }

    }
}
