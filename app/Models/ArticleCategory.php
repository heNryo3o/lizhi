<?php

namespace App\Models;

class ArticleCategory extends PublicModel
{

    protected $fillable = [
        'name',
        'parent_id',
        'status',
        'updated_at',
        'created_at',
        'level',
        'seo_title',
        'seo_keywords',
        'seo_describe',
        'slug'
    ];

    protected $rememberCacheTag = 'ArticleCategory';

}
