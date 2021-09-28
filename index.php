<?php
require_once __DIR__ . "/vendor/autoload.php";
$client = new \AcmePhp\Core\src\Client();
echo "<h1>Register</h1>";
print_r($client->register());
echo "<h1>Register</h1>";
print_r($client->authorize("wovo.xyz"));