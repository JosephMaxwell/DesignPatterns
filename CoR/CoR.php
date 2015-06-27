<?php
namespace ShoppingCart;

use ShoppingCart\Model\Cache;

include '../src/Autoloader.php';

class CoR
{
    protected $_cache;

    public function __construct(Cache $cache)
    {
        $this->_cache = $cache;
    }

    public function get()
    {
        return $this->_cache->get('memcached');
    }
}

$cache = new Cache();
$app = new CoR($cache);

echo $app->get();