<?php

namespace Litecms\Block\Http\Controllers;

use Exception;
use Litecms\Block\Actions\BlockWorkflow;
use Litecms\Block\Http\Requests\BlockWorkflowRequest;
use Litecms\Block\Http\Resources\BlockResource;
use Litecms\Block\Models\Block;
use Litepie\Http\Controllers\ActionController as BaseController;

/**
 * Workflow controller class.
 *
 */
class BlockWorkflowController extends BaseController
{
    /**
     * Action controller function for block.
     *
     * @param Model $block
     * @param action next action for the block.
     *
     * @return Response
     */
    public function __invoke(BlockWorkflowRequest $request, Block $block, $trasition)
    {
        try {
            $block = BlockWorkflow::run($request, $block, $trasition);
            $data = new BlockResource($block);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('block::block.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('block/block/' . $block->getRouteKey()))
                ->redirect();
        }
    }
}
