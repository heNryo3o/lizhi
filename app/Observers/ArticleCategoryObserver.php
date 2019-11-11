<?php

namespace App\Observers;

use App\Models\ArticleCategory;

class ArticleCategoryObserver
{
    public function saved(ArticleCategory $model){

        $model->flushCache();

    }

    public function deleted(ArticleCategory $model){

        $model->flushCache();

    }

    public function created(ArticleCategory $model){

        $model->flushCache();

    }
}
