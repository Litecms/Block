<?php

namespace Litecms\Block\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Block\Models\Category $category)
    {
        return [
            'id'     => $category->getRouteKey(),
            'name'   => $category->name,
            'status' => $category->status,
        ];
    }
}
