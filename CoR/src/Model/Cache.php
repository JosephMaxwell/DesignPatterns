<?php
namespace ShoppingCart\Model;

use ShoppingCart\Model\Cache\Db;
use ShoppingCart\Model\Cache\Memcached;
use ShoppingCart\Model\Cache\Redis;

class Cache
{
    protected $_primary;

    /**
     * Should use Yaml file to load cache options.
     */
    public function __construct()
    {
        $primary = new Redis();
        $primary->append(new Db());
        $primary->append(new Memcached());

        $this->_primary = $primary;
    }

    public function get($key)
    {
        return $this->_primary->get($key);
    }
}