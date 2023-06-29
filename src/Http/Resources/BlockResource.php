<?php

namespace Litecms\Block\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlockResource extends JsonResource
{

    public function itemLink()
    {
        return guard_url('block/block') . '/' . $this->getRouteKey();
    }

    public function title()
    {
        if ($this->title != '') {
            return $this->title;
        }

        if ($this->name != '') {
            return $this->name;
        }

        return 'None';
    }

    public function toArray($request)
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'category_id' => $this->category_id,
            'name' => $this->name,
            'url' => $this->url,
            'icon' => $this->icon,
            'order' => $this->order,
            'description' => $this->description,
            'image' => $this->image,
            'images' => $this->images,
            'slug' => $this->slug,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'user_type' => $this->user_type,
            'upload_folder' => $this->upload_folder,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
                'workflow' => $this->workflows(),
                'actions' => $this->actions(),
            ],
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
                'workflow' => $this->workflows(),
                'actions' => $this->actions(),
            ],
        ];
    }

    private function workflows()
    {
        $arr = [];
        foreach ($this->resource->transitions() as $key => $transition) {
            $name = $transition->getName();
            $arr[$key]['url'] = guard_url('block/block/workflow/' . $this->getRouteKey() . '/' . $name);
            $arr[$key]['name'] = $name;
            $arr[$key]['key'] = $name;
            $arr[$key]['form'] = $transition->form;
            $arr[$key]['label'] = trans('block::block.workflow.' . $name);
        }
        return $arr;

    }
    private function actions()
    {

        $arr = [];

        return $arr;
    }
}
