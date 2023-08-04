<?php

namespace Litecms\Block\Policies;

use Litecms\Block\Models\Block;
use Illuminate\Foundation\Auth\User as Authenticatable;

trait BlockWorkflow
{

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
     * Determine if the given user can approve the given block.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function submit(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.submit')) {
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
    public function publish(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.publish')) {
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
    public function unpublish(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.unpublish')) {
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
    public function archive(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.archive')) {
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
    public function unarchive(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.unarchive')) {
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
    public function reject(Authenticatable $user, Block $block)
    {
        if ($user->canDo('block.block.reject')) {
            return true;
        }

        return false;
    }

}
