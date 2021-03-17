<?php

namespace App\Http\Resources\Category\Base;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_category' => $this->whenLoaded('parentCategory') ? new CategoryResource($this->whenLoaded('parentCategory')) : null,
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
        ];
    }
}
