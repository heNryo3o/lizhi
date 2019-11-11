<?php

namespace App\Observers;

use App\Models\Banner;

class BannerObserver
{
    public function saved(Banner $model){

        $model->flushCache();

    }

    public function deleted(Banner $model){

        $model->flushCache();

    }

    public function created(Banner $model){

        $model->flushCache();

    }
}
