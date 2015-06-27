<?php
namespace ShoppingCart;

use ShoppingCart\Model\Product\Simple as SimpleProduct;
use ShoppingCart\Model\Product\ChildSelect as ChildSelectProduct;
use ShoppingCart\Model\Product\Bundle as BundleProduct;
include '../src/Autoloader.php';

class FactoryOriginal
{
    public function loadProduct($id)
    {
        $data = $this->getProductArrayFromDbFor($id);
        switch ($data['type']) {
            case 'simple': 
                $product = new SimpleProduct($data);
                break;
            
            case 'childselect':
                $product = new ChildSelectProduct($data);
                break;
            
            case 'bundle':
                $product = new BundleProduct($data);
                break;
        }
        
        return $product;
    }

    public function getProductArrayFromDbFor($id)
    {
        return array(
            'type' => 'simple',
            'id' => $id
        );
    }
}

$application = new FactoryOriginal();
var_dump($application->loadProduct(1));