<?php

namespace Litecms\Block\Repositories\Criteria;

use Litepie\Repository\Contracts\CriteriaInterface;
use Litepie\Repository\Contracts\RepositoryInterface;

class BlockResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        if(user()->isAdmin()){
            return $model;
        }
        $model = $model
                        ->where('user_id','=', user_id())
                        ->where('user_type','=', user_type());
        return $model;
    }
}