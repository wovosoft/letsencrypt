<?php
require_once __DIR__ . "/vendor/autoload.php";
$gk= new \AcmePhp\Core\src\GenerateKeyPair();
var_dump($gk->getKeyPair());
