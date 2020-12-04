<?php

namespace Litecms\Block\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model as Model;
use Litepie\Database\Traits\Sluggable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Activities\Traits\LogsActivity;
use Litepie\Trans\Traits\Translatable;
use Litepie\User\Traits\User as UserModel;

class Block extends Model
{
    use Filer, SoftDeletes, Hashids, Sluggable, Translatable, LogsActivity, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'litecms.block.block';

    /**
     * The blog_categories that belong to the blog.
     */
    public function category()
    {

        return $this->belongsTo('Litecms\Block\Models\Category', 'category_id');
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id');
    }


}
