<?php
namespace ShoppingCart\Model\Session;

class Singleton
{
    protected $_createTime;
    protected $_data;

    protected static $_instance;

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    protected function __construct()
    {
        session_start();
        $this->_createTime = time();
        $this->_data = $_SESSION;
    }

    public function __destruct()
    {
        $_SESSION = array_merge($_SESSION, $this->_data);
    }

    public function getCreatedTime()
    {
        return date('H:m:s', $this->_createTime);
    }

    public function get($key)
    {
        return $this->_data[$key];
    }

    public function set($key)
    {
        $this->_data[$key] = $key;
        return $this;
    }
}