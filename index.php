<?php
require_once __DIR__ . "/vendor/autoload.php";
//$gk= new \AcmePhp\Core\src\GenerateKeyPair();
//var_dump($gk->handle());
$sk = new \AcmePhp\Core\src\SecureHttpClient();
var_dump($sk->getClient());
