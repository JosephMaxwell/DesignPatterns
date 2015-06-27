<?php
include('../vendor/aura/autoload/autoload.php');
include('../vendor/autoload.php');

$loader = new \Aura\Autoload\Loader();
$loader->register();
$loader->addPrefix('ShoppingCart\Model', 'src/Model');
$loader->addPrefix('ShoppingCart', './');
