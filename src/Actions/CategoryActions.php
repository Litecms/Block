<?php

namespace Litecms\Block\Actions;

use Illuminate\Support\Str;
use Litecms\Block\Models\Category;
use Litecms\Block\Scopes\CategoryResourceScope;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Database\RequestScope;

class CategoryActions
{
    use AsAction;
    use LogsActions;
    
    protected $model;
    protected $namespace = 'litecms.block.category';
    protected $eventClass = \Litecms\Block\Events\CategoryAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, array $request)
    {
        $this->model = app(Category::class);
        $this->action = $action;
        $this->request = $request;
        $this->function = Str::camel($action);

        $function = Str::camel($action);

        $this->dispatchActionBeforeEvent();
        $data = $this->$function($request);
        $this->dispatchActionAfterEvent();

        $this->logsAction();
        return $data;

    }

    public function paginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $category = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new CategoryResourceScope())
            ->paginate($pageLimit);

        return $category;
    }

    public function simplePaginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $category = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new CategoryResourceScope())
            ->simplePaginate($pageLimit);

        return $category;
    }

    function empty(array $request) {
        return $this->model->forceDelete();
    }

    function restore(array $request) {
        return $this->model->restore();
    }

    public function delete(array $request)
    {
        $ids = $request['ids'];
        $ids = collect($ids)->map(function ($id) {
            return hashids_decode($id);
        });
        return $this->model->whereIn('id', $ids)->delete();
    }

    public function options(array $request)
    {
        return $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new CategoryResourceScope())
            ->take(30)->get()
            ->map(function ($row) {
                return [
                    'key' => $row->id,
                    'value' => $row->id,
                    'text' => $row->name,
                ];
            })->toArray();
    }
}