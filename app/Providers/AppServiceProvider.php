<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleCategory;
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
use App\Observers\ArticleCategoryObserver;
use App\Observers\ArticleObserver;
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
        ArticleCategory::observe(ArticleCategoryObserver::class);
        Article::observe(ArticleObserver::class);
    }
}
