<?php
namespace ShoppingCart\Model\Session;

class Php extends Base
{
    protected $_createTime;
    protected $_data = array();
    protected $_isSetup = false;

    public function __construct()
    {
        parent::__construct();
        session_start();

        if (isset($_SESSION)) {
            $this->_data = $_SESSION;
        }
    }

    public function __destruct()
    {
        if (isset($_SESSION)) {
            $_SESSION = array_merge($_SESSION, $this->_data);
        }
    }
}