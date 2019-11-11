<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Permission;
use App\Models\Push;
use App\Models\Role;
use App\Models\Store;
use App\Models\Upload;
use App\Models\User;
use App\Observers\AdminObserver;
use App\Observers\AppsObserver;
use App\Observers\BannerObserver;
use App\Observers\CategoryObserver;
use App\Observers\NewsCategoryObserver;
use App\Observers\NewsObserver;
use App\Observers\PermissionObserver;
use App\Observers\PushObserver;
use App\Observers\RoleObserver;
use App\Observers\StoreObserver;
use App\Observers\UploadObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        NewsCategory::observe(NewsCategoryObserver::class);
        Apps::observe(AppsObserver::class);
        Banner::observe(BannerObserver::class);
        News::observe(NewsObserver::class);
    }
}
