A lightweight cache library inspired by illuminate/cache.

It's not contain file base or database handler because not recommend.
If you want that feature, you can easily extend by yourself or just switch to another cache library.


code:

```php
<?php
require 'vendor/autoload.php';

use Monster\Cache\Cache;
use Monster\Cache\Handlers;

$memcached = new Memcached();
$memcached->addServer('127.0.0.1', 11211);

$memcachedHandler = new Handlers\Memcached($memcached);

$cache = new Cache($memcachedHandler);

$cache->set('key', 'value', 60);
$data = $cache->get('key');

var_dump($data);

```

