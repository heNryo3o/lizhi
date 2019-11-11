<?php

namespace App\Models;

class Banner extends PublicModel
{

    protected $fillable = [
        'thumb',
        'created_at',
        'updated_at',
        'status',
        'name',
        'url'
    ];

    protected $rememberCacheTag = 'Banner';

}
