<?php

namespace App\Models;

class Article extends PublicModel
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
        'url',
        'words'
    ];

    protected $casts = [
        'words' => 'json'
    ];

    protected $rememberCacheTag = 'Article';

    protected $appends = ['category_name'];

    public function getCategoryNameAttribute()
    {

        $category = ArticleCategory::where(['id'=>$this->category_1])->remember(10080)->get(['name'])->first();

        return $category ? $category->name : '';

    }

}
