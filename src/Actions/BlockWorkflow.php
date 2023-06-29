<?php

namespace Litecms\Block\Actions;

use Illuminate\Http\Request;
use Litecms\Block\Models\Block;
use Litepie\Actions\Concerns\AsAction;
use Illuminate\Support\Str;

class BlockWorkflow
{
    use AsAction;

    public function handle(Request $request, Block $block, string $transition)
    {
        $this->model = $block;
        $block->workflow()->apply($block, $transition);
        $transition = Str::camel($transition);
        return $this->$transition($block);
    }

    public function submit()
    {
        $this->model->status = 'Pending';
        $this->model->save();
        return $this->model;
    }

    public function approve()
    {
        $this->model->status = 'Approved';
        $this->model->save();
        return $this->model;
    }

    public function reject()
    {
        $this->model->status = 'Draft';
        $this->model->save();
        return $this->model;
    }

    public function publish()
    {
        $this->model->status = 'Published';
        $this->model->save();
        return $this->model;
    }

    public function unpublish()
    {
        $this->model->status = 'Unpublished';
        $this->model->save();
        return $this->model;
    }

    public function archive()
    {
        $this->model->status = 'Archived';
        $this->model->save();
        return $this->model;
    }

    public function unarchive()
    {
        $this->model->status = 'Draft';
        $this->model->save();
        return $this->model;
    }
}
