<?php

namespace Litecms\Block\Actions;

use Illuminate\Support\Str;
use Litecms\Block\Models\Block;
use Litecms\Block\Scopes\BlockResourceScope;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Database\RequestScope;

class BlockActions
{
    use AsAction;
    use LogsActions;
    
    protected $model;
    protected $namespace = 'litecms.block.block';
    protected $eventClass = \Litecms\Block\Events\BlockAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, array $request)
    {
        $this->model = app(Block::class);
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
        $block = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new BlockResourceScope())
            ->paginate($pageLimit);

        return $block;
    }

    public function simplePaginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $block = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new BlockResourceScope())
            ->simplePaginate($pageLimit);

        return $block;
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
            ->pushScope(new BlockResourceScope())
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