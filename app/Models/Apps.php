<?php

namespace App\Models;

class Apps extends PublicModel
{

    protected $fillable = [
        'created_at',
        'updated_at',
        'browse',
        'name',
        'content',
        'thumb',
        'attaches',
        'code',
        'category_1',
        'category_2',
        'seo_title',
        'seo_keywords',
        'seo_describe',
        'is_recommen',
        'status',
        'url',
        'slug'
    ];

    protected $rememberCacheTag = 'Apps';

    protected $casts = [
        'attaches' => 'json'
    ];

    protected $appends = ['category_name'];

    public function getCategoryNameAttribute()
    {

        $category = Category::where(['id'=>$this->category_1])->remember(10080)->get(['name'])->first();

        return $category ? $category->name : '';

    }

}
