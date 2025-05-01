<?php
namespace Msd0s\PageCache\Middleware;

use Closure;
use Msd0s\PageCache\Models\PageCacheModel;
use Illuminate\Http\Request;

class PageCacheMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->fullUrl();

        // بررسی وجود کش
        $cachedPage = PageCacheModel::getCache($url);
        if ($cachedPage) {
            return response($cachedPage->content);
        }

        // ادامه پردازش درخواست
        $response = $next($request);

        // ذخیره محتوای رندر شده در دیتابیس
        if ($response->isSuccessful()) {
            PageCacheModel::storeCache($url, $response->getContent());
        }

        return $response;
    }
}