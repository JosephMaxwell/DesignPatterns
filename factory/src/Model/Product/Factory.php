<?php
namespace ShoppingCart\Model\Product;

use Symfony\Component\Yaml\Parser;
use ShoppingCart\Model\ProductInterface;

class Factory
{
    /**
     * Converts an array of product information into
     * a product object.
     *
     * @param array $data
     * @throws \Exception
     * @return ProductInterface
     */
    public static function build($data)
    {
        $yaml = self::getYaml();
        $type = $data['type'];

        if (isset($yaml['products'][$type])) {
            $className = $yaml['products'][$type]['class'];
            return new $className($data);
        } else {
            throw new \Exception('Product type not found.');
        }
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

