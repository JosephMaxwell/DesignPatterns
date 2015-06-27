<?php
namespace ShoppingCart;

use ShoppingCart\Model\Product\Factory as ProductFactory;
include '../src/Autoloader.php';

class Factory
{
    public function loadProduct($id)
    {
        $data = $this->getProductArrayFromDbFor($id);
        return ProductFactory::build($data);
    }

    public function getProductArrayFromDbFor($id)
    {
        return array(
            'type' => 'simple',
            'id' => $id
        );
    }
}

$application = new Factory();
var_dump($application->loadProduct(1));