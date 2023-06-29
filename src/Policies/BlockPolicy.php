<?php

namespace Litecms\Block\Policies;

use Litepie\User\Interfaces\UserPolicyInterface;
use Litecms\Block\Models\Block;

class BlockPolicy
{

    use BlockWorkflow;

    /**
     * Determine if the given user can view the block.
     *
     * @param UserPolicyInterface $authUser
     * @param Block $block
     *
     * @return bool
     */
    public function view(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.view') && $authUser->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can create a block.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function create(UserPolicyInterface $authUser)
    {
        return  $authUser->canDo('block.block.create');
    }

    /**
     * Determine if the given user can update the given block.
     *
     * @param UserPolicyInterface $authUser
     * @param Block $block
     *
     * @return bool
     */
    public function update(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.edit') && $authUser->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given block.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function destroy(UserPolicyInterface $authUser, Block $block)
    {
        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given block.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function verify(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given block.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function approve(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.approve')) {
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
