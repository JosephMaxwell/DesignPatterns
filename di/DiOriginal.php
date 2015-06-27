<?php
namespace ShoppingCart;

use ShoppingCart\Model\Session\Php as Session;

include '../src/Autoloader.php';

class DiOriginal
{
    public function getSession()
    {
        return new Session();
    }
}

$app = new DiOriginal();
echo sprintf("First Query: %s<br/>", $app->getSession()->getCreatedTime());
sleep(2);
echo sprintf("Last Query: %s", $app->getSession()->getCreatedTime());
