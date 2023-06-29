<?php

namespace Litecms\Block\Policies;

use Litepie\User\Interfaces\UserPolicyInterface;
use Litecms\Block\Models\Category;

class CategoryPolicy
{


    /**
     * Determine if the given user can view the category.
     *
     * @param UserPolicyInterface $authUser
     * @param Category $category
     *
     * @return bool
     */
    public function view(UserPolicyInterface $authUser, Category $category)
    {
        if ($authUser->canDo('block.category.view') && $authUser->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can create a category.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function create(UserPolicyInterface $authUser)
    {
        return  $authUser->canDo('block.category.create');
    }

    /**
     * Determine if the given user can update the given category.
     *
     * @param UserPolicyInterface $authUser
     * @param Category $category
     *
     * @return bool
     */
    public function update(UserPolicyInterface $authUser, Category $category)
    {
        if ($authUser->canDo('block.category.edit') && $authUser->isAdmin()) {
            return true;
        }

        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given category.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function destroy(UserPolicyInterface $authUser, Category $category)
    {
        return $category->user_id == user_id() && $category->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given category.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function verify(UserPolicyInterface $authUser, Category $category)
    {
        if ($authUser->canDo('block.category.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given category.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function approve(UserPolicyInterface $authUser, Category $category)
    {
        if ($authUser->canDo('block.category.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $authUser    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($authUser, $ability)
    {
        if ($authUser->isSuperuser()) {
            return true;
        }
    }
}
