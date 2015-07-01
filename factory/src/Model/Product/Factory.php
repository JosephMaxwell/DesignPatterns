<?php
namespace ShoppingCart\Model\Product;

use ShoppingCart\Model\Product\Simple as SimpleProduct;
use ShoppingCart\Model\Product\ChildSelect as ChildSelectProduct;
use ShoppingCart\Model\Product\Bundle as BundleProduct;

use Symfony\Component\Yaml\Parser;
use ShoppingCart\Model\ProductInterface;

class Factory
{
    public static function build($data)
    {
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

    protected static function getYaml()
    {
        $yaml = new Parser();

        $output = $yaml->parse(file_get_contents('config/products.yaml'));
        if (!is_array($output)) {
            $output = array();
        }

        return $output;
    }
}