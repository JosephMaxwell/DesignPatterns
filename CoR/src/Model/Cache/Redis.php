<?php
namespace ShoppingCart\Model\Cache;

class Redis extends Base
{
    protected function getDataFor($key)
    {
        if ($key == 'redis') {
            return 'redis output';
        }

        return '';
    }
}