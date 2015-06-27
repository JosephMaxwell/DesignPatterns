<?php
namespace ShoppingCart;

use ShoppingCart\Model\Cache\Redis;
use ShoppingCart\Model\Cache\Memcached;
use ShoppingCart\Model\Cache\Db;

include '../src/Autoloader.php';

class CoROriginal
{
    public function get()
    {
        $key = 'db';

        $redis = new Redis();
        if ($value = $redis->get($key)) {
            return $key;
        } else {
            $memcached = new Memcached();
            if ($value = $memcached->get($key)) {
                return $value;
            } else {
                $db = new Db();
                if ($value = $db->get($key)) {
                    return $value;
                }
            }
        }

        return '';
    }
}

$original = new CoROriginal();
echo $original->get();