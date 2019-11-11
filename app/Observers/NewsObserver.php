<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    public function saved(News $model){

        $model->flushCache();

    }

    public function deleted(News $model){

        $model->flushCache();

    }

    public function created(News $model){

        $model->flushCache();

    }
}
