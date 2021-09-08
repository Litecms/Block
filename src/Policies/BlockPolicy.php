<?php

namespace Litecms\Block\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Block\Models\Block;

class BlockPolicy
{

    /**
     * Determine if the given user can view the block.
     *
     * @param UserPolicy $user
     * @param Block $block
     *
     * @return bool
     */
    public function view(UserPolicy $user, Block $block)
    {
        if ($user->canDo('block.block.view') && $user->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can create a block.
     *
     * @param UserPolicy $user
     * @param Block $block
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('block.block.create');
    }

    /**
     * Determine if the given user can update the given block.
     *
     * @param UserPolicy $user
     * @param Block $block
     *
     * @return bool
     */
    public function update(UserPolicy $user, Block $block)
    {
        if ($user->canDo('block.block.edit') && $user->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given block.
     *
     * @param UserPolicy $user
     * @param Block $block
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Block $block)
    {
        return $block->user_id == user_id() && $block->user_type == user_type();
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
