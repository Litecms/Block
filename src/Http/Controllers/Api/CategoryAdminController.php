<?php

namespace Litecms\Block\Http\Controller\Api;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Block\Http\Requests\CategoryAdminApiRequest;
use Litecms\Block\Interfaces\CategoryRepositoryInterface;
use Litecms\Block\Models\Category;

/**
 * Admin API controller class.
 */
class CategoryAdminController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';

    /**
     * Initialize category controller.
     *
     * @param type CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware('api');
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $category;
        parent::__construct();
    }

    /**
     * Display a list of category.
     *
     * @return json
     */
    public function index(CategoryAdminApiRequest $request)
    {
        $categories = $this->repository
            ->setPresenter('\\Litecms\\Block\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $categories['code'] = 2000;
        return response()->json($categories)
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display category.
     *
     * @param Request $request
     * @param Model   Category
     *
     * @return Json
     */
    public function show(CategoryAdminApiRequest $request, Category $category)
    {
        $category = $category->presenter();
        $category['code'] = 2001;
        return response()->json($category)
            ->setStatusCode(200, 'SHOW_SUCCESS');

    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(CategoryAdminApiRequest $request, Category $category)
    {
        $category = $category->presenter();
        $category['code'] = 2002;
        return response()->json($category)
            ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(CategoryAdminApiRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.api');
            $attributes['user_type'] = user_type();
            $category = $this->repository->create($attributes);
            $category = $category->presenter();
            $category['code'] = 2004;

            return response()->json($category)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');

        }
    }

    /**
     * Show category for editing.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function edit(CategoryAdminApiRequest $request, Category $category)
    {
        $category = $category->presenter();
        $category['code'] = 2003;
        return response()->json($category)
            ->setStatusCode(200, 'EDIT_SUCCESS');
    }

    /**
     * Update the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function update(CategoryAdminApiRequest $request, Category $category)
    {
        try {

            $attributes = $request->all();

            $category->update($attributes);
            $category = $category->presenter();
            $category['code'] = 2005;

            return response()->json($category)
                ->setStatusCode(201, 'UPDATE_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return json
     */
    public function destroy(CategoryAdminApiRequest $request, Category $category)
    {

        try {

            $t = $category->delete();

            return response()->json([
                'message' => trans('messages.success.delete', ['Module' => trans('block::category.name')]),
                'code'    => 2006,
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
