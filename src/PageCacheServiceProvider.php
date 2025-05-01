<?php
namespace Msd0s\PageCache;

use Illuminate\Support\ServiceProvider;

class PageCacheServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('page-cache', function () {
            return new PageCache();
        });
    }

    public function boot()
    {
        // انتشار فایل‌های مهاجرت
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        // ثبت میان‌افزار
        $this->app['router']->aliasMiddleware('page.cache', \YourVendorName\PageCache\Middleware\PageCacheMiddleware::class);
    }
}