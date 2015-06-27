<?php
namespace ShoppingCart;

use ShoppingCart\Model\Session\Base as Session;

include '../src/Autoloader.php';

class Di
{
    protected $_session;

    public function __construct(Session $session)
    {
        $this->_session = $session;
    }

    public function saveToSession()
    {
        $this->_session->set('time', date('H:i:s'));
    }

    public function getFromSession()
    {
        return $this->_session->get('time');
    }
}

$session = new Session();

$app = new Di($session);
$app->saveToSession();
echo sprintf("Result: %s<br/>", $app->getFromSession('time'));