<?php
namespace ShoppingCart\Model\Cache;

class Request
{
    protected $_key;
    protected $_result;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->_result;
    }

    /**
     * @param mixed $result
     * @return $this
     */
    public function setResult($result)
    {
        $this->_result = $result;
        return $this;
    }
}