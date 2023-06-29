<?php

namespace Litecms\Block\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Litecms\Block\Models\Block;
use Litepie\Actions\Concerns\AsAction;

class BlockAction
{
    use AsAction;

    protected $model;
    protected $namespace = 'litecms.block.block';
    protected $eventClass = \Litecms\Block\Events\BlockAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, Block $block, array $request = [])
    {
        $this->action = $action;
        $this->request = $request;
        $this->model = $block;
        $this->function = Str::camel($action);
        $this->executeAction();
        return $this->model;

    }

    public function store(Block $block, array $request)
    {
        $attributes = $request;
        $attributes['user_id'] = user_id();
        $attributes['user_type'] = user_type();
        $block = $block->create($attributes);
        return $block;
    }

    public function update(Block $block, array $request)
    {
        $attributes = $request;
        $block->update($attributes);
        return $block;
    }

    public function destroy(Block $block, array $request)
    {
        $block->delete();
        return $block;
    }

    public function copy(Block $block, array $request)
    {
        $count = $request['count'] ?: 1;

        if ($count == 1) {
            $block = $block->replicate();
            $block->created_at = Carbon::now();
            $block->save();
            return $block;
        }

        for ($i = 1; $i <= $count; $i++) {
            $new = $block->replicate();
            $new->created_at = Carbon::now();
            $new->save();
        }

        return $block;
    }

}
