<?php
namespace ShoppingCart\Model;

interface ProductInterface
{
    public function getId();
    public function getName();
    public function getPrice();

    /*  ...  */
}