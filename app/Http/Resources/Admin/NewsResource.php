<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->toDateTimeString(),
            'content' => $this->content,
            'thumb' => $this->thumb,
            'category_1' => $this->category_1,
            'browse' => $this->browse,
            'is_recommen' => $this->is_recommen,
            'seo_title' => $this->seo_title,
            'seo_keywords' => $this->seo_keywords,
            'seo_describe' => $this->seo_describe,
            'category_name' => $this->category_name,
            'category' => [$this->category_1],
            'is_recommen' => $this->is_recommen,
            'status' => $this->status
        ];

    }

}
