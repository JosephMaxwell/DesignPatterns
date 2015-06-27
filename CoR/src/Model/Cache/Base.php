<?php
namespace ShoppingCart\Model\Cache;

abstract class Base
{
    protected $_successor;
    protected $_result;
    protected $_data;

    public function append(Base $successor)
    {
        if (!$this->_successor) {
            $this->_successor = $successor;
        } else {
            $this->_successor->append($successor);
        }
    }

    public function get($request)
    {
        if (!($request instanceof Request)) {
            $key = $request;
            $request = new Request();
            $request->setKey($key);
        }

        $success = $this->processing($request);
        if (!$success) {
            if ($this->_successor) {
                $this->_successor->get($request);
            }
        }

        return $request->getResult();
    }

    public function processing(Request $request)
    {
        $key = $request->getKey();
        $value = $this->getDataFor($key);

        if ($value) {
            $request->setResult($value);
            return true;
        } else {
            return false;
        }
    }

    abstract protected function getDataFor($key);

    public function getSuccessor()
    {
        return $this->_successor;
    }
}