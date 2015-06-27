<?php
namespace ShoppingCart\Tests\Model\Singleton;

use ShoppingCart\Model\Session\Singleton as Session;

/**
 * Class SessionTest
 * @group invalid
 * @package ShoppingCart\Tests\Model\Singleton
 */
class InvalidSessionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInstance()
    {
        $session = Session::getInstance();

        $this->assertInstanceOf('ShoppingCart\Model\Singleton\Session', $session, 'Instance of session object');
        $this->assertEquals(date('H:i:s'), $session->getCreatedTime(), 'Instance has correct time');
    }
}