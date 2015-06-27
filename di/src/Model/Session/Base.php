<?php
namespace ShoppingCart\Model\Session;

class Base
{
    protected $_createTime;
    protected $_data = array();
    protected $_isSetup = false;

    public function __construct()
    {
        $this->_createTime = time();
    }

    public function getCreatedTime()
    {
        return date('H:i:s', $this->_createTime);
    }

    public function get($key)
    {
        return $this->_data[$key];
    }

    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }
}