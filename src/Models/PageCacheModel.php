<?php
namespace Msd0s\PageCache\Models;

use Illuminate\Database\Eloquent\Model;

class PageCacheModel extends Model
{
    protected $table = 'page_caches';
    protected $fillable = ['url', 'content'];

    public static function getCache($url)
    {
        return self::where('url', $url)->first();
    }

    public static function storeCache($url, $content)
    {
        // حذف کش قبلی
        self::where('url', $url)->delete();

        // ایجاد کش جدید
        return self::create([
            'url' => $url,
            'content' => $content
        ]);
    }
}