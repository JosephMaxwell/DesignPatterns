<?php
namespace ShoppingCart\Tests\Model\Cache;

use ShoppingCart\Model\Cache\Redis;
use ShoppingCart\Model\Cache\Db;

/**
 * Class SessionTest
 * @group valid
 * @package ShoppingCart\Tests
 */
class RedisTest extends \PHPUnit_Framework_TestCase
{
    protected $_cache;

    public function testAppend()
    {
        $redis = new Redis();
        $db = new Db();

        $redis->append($db);
        $this->assertEquals($redis->getSuccessor(), $db);
    }

    public function testHandle()
    {
        $redisMap = $this->returnValueMap(array(
            array('redis', 'redis_result')
        ));
        /** @var Redis $redis */
        $redis = $this->getMock('ShoppingCart\Model\Cache\Redis', array('getDataFor'));
        $redis->expects($this->any())->method('getDataFor')->will();

        $dbMap = $this->returnValueMap(array(
            array('db', 'db_result')
        ));
        /** @var Db $db */
        $db = $this->getMock('ShoppingCart\Model\Cache\Db', array('getDataFor'));
        $db->expects($this->any())->method('getDataFor')->will();

        $redis->append($db);

        $result = $redis->get('redis');
        $this->assertEquals('redis_result', $result);

        $result = $redis->get('db');
        $this->assertEquals('db_result', $result);
    }
}