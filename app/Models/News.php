<?php

namespace App\Models;

class News extends PublicModel
{

    protected $fillable = [
        'created_at',
        'updated_at',
        'browse',
        'name',
        'content',
        'thumb',
        'category_1',
        'seo_title',
        'seo_keywords',
        'seo_describe',
        'is_recommen',
        'status',
        'slug',
        'url'
    ];

    protected $rememberCacheTag = 'News';

    protected $appends = ['category_name'];

    public function getCategoryNameAttribute()
    {

        $category = NewsCategory::where(['id'=>$this->category_1])->remember(10080)->get(['name'])->first();

        return $category ? $category->name : '';

    }

}
