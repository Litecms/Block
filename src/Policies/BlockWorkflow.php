<?php

namespace Litecms\Block\Policies;

use Litecms\Block\Models\Block;
use Litepie\User\Interfaces\UserPolicyInterface;

trait BlockWorkflow
{

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
     * Determine if the given user can approve the given block.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function submit(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.submit')) {
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
    public function publish(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.publish')) {
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
    public function unpublish(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.unpublish')) {
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
    public function archive(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.archive')) {
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
    public function unarchive(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.unarchive')) {
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
    public function reject(UserPolicyInterface $authUser, Block $block)
    {
        if ($authUser->canDo('block.block.reject')) {
            return true;
        }

        return false;
    }

}
