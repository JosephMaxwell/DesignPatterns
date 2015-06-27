<?php
namespace ShoppingCart\Tests;

use ShoppingCart\Di;
use ShoppingCart\Model\Session\Base as Session;
/**
 * Class SessionTest
 * @group valid
 * @package ShoppingCart\Tests
 */
class DiTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSession()
    {
        $session = new Session();
        $app = new Di($session);

        $app->saveToSession();

        $this->assertEquals($app->getFromSession(), date('H:i:s'), 'Session has correct key');
    }
}