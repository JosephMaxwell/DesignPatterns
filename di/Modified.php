<?php
namespace ShoppingCart;

use ShoppingCart\Model\Session\Singleton as Session;
include '../src/Autoloader.php';

class Modified
{
    public function getSession()
    {
        return Session::getInstance();
    }
}

$app = new Modified();
echo sprintf("First Query: %s<br/>", $app->getSession()->getCreatedTime());
sleep(2);
echo sprintf("Last Query: %s", $app->getSession()->getCreatedTime());
