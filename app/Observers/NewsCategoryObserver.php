<?php

namespace App\Observers;

use App\Models\NewsCategory;

class NewsCategoryObserver
{
    public function saved(NewsCategory $model){

        $model->flushCache();

    }

    public function deleted(NewsCategory $model){

        $model->flushCache();

    }

    public function created(NewsCategory $model){

        $model->flushCache();

    }
}
