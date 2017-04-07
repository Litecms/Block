<?php

namespace Litecms\Block\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Litecms\Block\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Category\Interfaces\CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
        $this->repository = $category;
        parent::__construct();
    }

    /**
     * Show category's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $this->repository->pushCriteria(new \Litecms\Block\Repositories\Criteria\CategoryPublicCriteria());
        $categories = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('id', 'DESC');
        })->paginate();

        return $this->theme->of('block::public.category.index', compact('categories'))->render();
    }

    /**
     * Show category.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $category = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')
                ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('block::public.category.show', compact('category'))->render();
    }
}
