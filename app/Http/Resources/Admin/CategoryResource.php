<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->toDateTimeString(),
            'parent_id' => $this->parent_id,
            'level' => $this->level,
            'status' => $this->status,
            'seo_title' => $this->seo_title,
            'seo_keywords' => $this->seo_keywords,
            'seo_describe' => $this->seo_describe,
        ];

    }

}
