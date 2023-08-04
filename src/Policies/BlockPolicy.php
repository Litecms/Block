<?php

namespace Litecms\Block\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Litecms\Block\Models\Block;

class BlockPolicy
{

    use BlockWorkflow;

    /**
     * Determine if the given user can view the block.
     *
     * @param Authenticatable $user
     * @param Block $block
     *
     * @return bool
     */
    public function view(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.view') && $user->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can create a block.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function create(Authenticatable $user)
    {
        return  $user->canDo('block.block.create');
    }

    /**
     * Determine if the given user can update the given block.
     *
     * @param Authenticatable $user
     * @param Block $block
     *
     * @return bool
     */
    public function update(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.edit') && $user->isAdmin()) {
            return true;
        }

        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given block.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function destroy(Authenticatable $user, Block $block)
    {
        return $block->user_id == user_id() && $block->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given block.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function verify(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given block.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function approve(Authenticatable $user, Block $block)
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
