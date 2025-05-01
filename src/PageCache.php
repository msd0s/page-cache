<?php
namespace Msd0s\PageCache;

use Msd0s\PageCache\Models\PageCacheModel;

class PageCache
{
    /**
     * به‌روزرسانی یا ایجاد کش جدید برای یک صفحه
     *
     * @param string $url آدرس صفحه
     * @param string $content محتوای HTML رندر شده
     * @return bool
     */
    public function updateCache(string $url, string $content): bool
    {
        try {
            PageCacheModel::storeCache($url, $content);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * حذف کش یک صفحه
     *
     * @param string $url آدرس صفحه
     * @return bool
     */
    public function clearCache(string $url): bool
    {
        try {
            PageCacheModel::where('url', $url)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}