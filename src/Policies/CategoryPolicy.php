<?php

namespace Litecms\Block\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Block\Models\Category;

class CategoryPolicy
{

    /**
     * Determine if the given user can view the category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function view(UserPolicy $user, Category $category)
    {
        if ($user->canDo('block.block.view') && $user->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can create a category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('block.block.create');
    }

    /**
     * Determine if the given user can update the given category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function update(UserPolicy $user, Category $category)
    {
        if ($user->canDo('block.block.edit') && $user->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Category $category)
    {
        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Category $category)
    {
        if ($user->canDo('block.block.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given category.
     *
     * @param UserPolicy $user
     * @param Category $category
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Category $category)
    {
        if ($user->canDo('block.block.approve')) {
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
