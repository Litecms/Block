<?php

namespace Litecms\Block\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Litecms\Block\Models\Category;
use Litepie\Actions\Concerns\AsAction;

class CategoryAction
{
    use AsAction;

    protected $model;
    protected $namespace = 'litecms.block.category';
    protected $eventClass = \Litecms\Block\Events\CategoryAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, Category $category, array $request = [])
    {
        $this->action = $action;
        $this->request = $request;
        $this->model = $category;
        $this->function = Str::camel($action);
        $this->executeAction();
        return $this->model;

    }

    public function store(Category $category, array $request)
    {
        $attributes = $request;
        $attributes['user_id'] = user_id();
        $attributes['user_type'] = user_type();
        $category = $category->create($attributes);
        return $category;
    }

    public function update(Category $category, array $request)
    {
        $attributes = $request;
        $category->update($attributes);
        return $category;
    }

    public function destroy(Category $category, array $request)
    {
        $category->delete();
        return $category;
    }

    public function copy(Category $category, array $request)
    {
        $count = $request['count'] ?: 1;

        if ($count == 1) {
            $category = $category->replicate();
            $category->created_at = Carbon::now();
            $category->save();
            return $category;
        }

        for ($i = 1; $i <= $count; $i++) {
            $new = $category->replicate();
            $new->created_at = Carbon::now();
            $new->save();
        }
        return $category;
    }
}
