<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function saved(Article $model){

        $model->flushCache();

    }

    public function deleted(Article $model){

        $model->flushCache();

    }

    public function created(Article $model){

        $model->flushCache();

    }
}
