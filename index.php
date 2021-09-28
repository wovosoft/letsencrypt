<?php
require_once __DIR__ . "/vendor/autoload.php";
$client = new \AcmePhp\Core\src\Client();
print_r($client->register());