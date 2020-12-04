<?php

namespace Litecms\Block\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Sluggable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Activities\Traits\LogsActivity;
use Litepie\Trans\Traits\Translatable;
use Litepie\User\Traits\User as UserModel;

class Category extends Model
{
    use Filer, SoftDeletes, Hashids, Sluggable, Translatable, LogsActivity, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'litecms.block.category';
    /**
     * The blog_categories that belong to the blog.
     */
    public function blocks()
    {
        return $this->hasMany('Litecms\Block\Models\Block', 'category_id');
    }

}
