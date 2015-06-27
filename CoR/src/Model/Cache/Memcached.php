<?php
namespace ShoppingCart\Model\Cache;

class Memcached extends Base
{
    protected function getDataFor($key)
    {
        if ($key == 'memcached') {
            return 'memcached output';
        }

        return '';
    }
}