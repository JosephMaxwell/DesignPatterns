<?php
namespace ShoppingCart;

use ShoppingCart\Model\Cache;

include '../src/Autoloader.php';

class CoR
{
    public function get($key)
    {
        $cacheTypes = ['Redis', 'Memcached', 'Db'];
        $value = '';

        foreach ($cacheTypes as $cacheType) {
            $cacheClass = sprintf("\ShoppingCart\Model\Cache\%s", $cacheType);
            $cache = new $cacheClass();

            if ($value = $cache->get($key)) {
                break;
            }
        }
        
        return $value;
    }
}

$cache = new Cache();
$app = new CoR($cache);

echo $app->get('db');