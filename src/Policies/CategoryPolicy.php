<?php

namespace Litecms\Block\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Litecms\Block\Models\Category;

class CategoryPolicy
{


    /**
     * Determine if the given user can view the category.
     *
     * @param Authenticatable $user
     * @param Category $category
     *
     * @return bool
     */
    public function view(Authenticatable $user, Category $category)
    {
        if ($user->canDo('block.category.view') && $user->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can create a category.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function create(Authenticatable $user)
    {
        return  $user->canDo('block.category.create');
    }

    /**
     * Determine if the given user can update the given category.
     *
     * @param Authenticatable $user
     * @param Category $category
     *
     * @return bool
     */
    public function update(Authenticatable $user, Category $category)
    {
        if ($user->canDo('block.category.edit') && $user->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given category.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function destroy(Authenticatable $user, Category $category)
    {
        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given category.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function verify(Authenticatable $user, Category $category)
    {
        if ($user->canDo('block.category.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given category.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function approve(Authenticatable $user, Category $category)
    {
        if ($user->canDo('block.category.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
