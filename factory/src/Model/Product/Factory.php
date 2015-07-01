<?php
namespace ShoppingCart\Model\Product;

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

$model = Mage::getModel('JosephMaxwell_Module/ModelClass');