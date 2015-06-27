<?php
namespace ShoppingCart\Tests\Model\Product;

use ShoppingCart\Model\Product\Factory;

/**
 * Class FactoryTest
 * @group valid
 * @package ShoppingCart\Tests\Model\Product
 */
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testBuildReturnsInterface()
    {
        $product = Factory::build(array(
            'id' => 1,
            'name' => 'T-Shirt',
            'type' => 'simple'
        ));

        $this->assertInstanceOf(
            'ShoppingCart\Model\ProductInterface',
            $product,
            'Factory returns interface.'
        );
    }

    public function testBuildThrowsExceptionUponInvalidClass()
    {
        try {
            Factory::build(array(
                'id' => 1,
                'name' => 'T-Shirt',
                'type' => 'simpleconfigurable'
            ));
            $failed = false;
        } catch (\Exception $ex) {
            $failed = true;
        }

        $this->assertTrue($failed, 'Factory sends exception when invalid type is used.');
    }
}