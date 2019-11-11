<?php

namespace App\Observers;

use App\Models\Apps;

class AppsObserver
{
    public function saved(Apps $model){

        $model->flushCache();

    }

    public function deleted(Apps $model){

        $model->flushCache();

    }

    public function created(Apps $model){

        $model->flushCache();

    }
}
