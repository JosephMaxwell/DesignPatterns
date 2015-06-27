<?php
namespace ShoppingCart\Model\Cache;

class Db extends Base
{
    protected function getDataFor($key)
    {
        if ($key == 'db') {
            return 'db output';
        }

        return '';
    }
}