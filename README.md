# Page Cache Package for Laravel

This package caches the rendered HTML of pages in the database and serves them to improve performance.

## Installation

1. Install the package via Composer:
   ```bash
   composer require msd0s/page-cache
   ```

2. Run migrations to create the `page_caches` table:
   ```bash
   php artisan migrate
   ```

3. Add the middleware to your `app/Http/Kernel.php`:
   ```php
   protected $middlewareGroups = [
       'web' => [
           // Other middlewares...
           \Msd0s\PageCache\Middleware\PageCacheMiddleware::class,
       ],
   ];
   ```

## Usage

### Updating Cache
To update the cache for a specific page:
```php
use Msd0s\PageCache\PageCache;

$pageCache = app('page-cache');
$pageCache->updateCache('https://example.com/sample-page', '<html>Your rendered HTML</html>');
```

### Clearing Cache
To clear the cache for a specific page:
```php
$pageCache->clearCache('https://example.com/sample-page');
```

## License
This package is open-sourced under the MIT license.