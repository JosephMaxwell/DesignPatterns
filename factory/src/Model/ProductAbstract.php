<?php
namespace ShoppingCart\Model;

abstract class ProductAbstract implements ProductInterface
{
    protected $_data = array();

    public function __construct($data)
    {
        $this->_data = $data;
    }

    public function getId()
    {
        return $this->_data['id'];
    }

    public function getName()
    {
        return $this->_data['name'];
    }

    public function getPrice()
    {
        return $this->_data['price'];
    }

}