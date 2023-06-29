<?php

namespace Litecms\Block\Http\Requests;

use Illuminate\Support\Arr;
use Litepie\Http\Request\AbstractRequest;
use Symfony\Component\Workflow\Transition;

class BlockWorkflowRequest extends AbstractRequest
{

    /* Model for the current request.
     *
     * @var array
     */
    protected $transition;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->model = $this->route('block');
        $this->transition = $this->getTransition();

        // Determine if the user is authorized to perform the transition.
        return $this->can($this->transition);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $metaData = $this->model->workflow()
            ->getMetadataStore()
            ->getTransitionMetadata(new Transition($this->transition, [], []));

        if (is_array($metaData)) {
            return Arr::get($metaData, 'rules', []);
        }
        return [];
    }

}
