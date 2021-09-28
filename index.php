<?php
require_once __DIR__ . "/vendor/autoload.php";
$client = new \AcmePhp\Core\src\Client();
//echo "<h1>Register</h1>";
//print_r($client->register());


echo "<h1>Register</h1>";
$options = $client->authorize("wovo.xyz");
//$c=new AcmePhp\Core\Protocol\AuthorizationChallenge();
//$c->get
foreach ($options as $option) {
    echo "Type :". $option->getType()."<br>";
    echo "URL :". $option->getUrl()."<br>";
    echo "Domain :". $option->getDomain()."<br>";
    echo "Token :". $option->getToken()."<br>";
    echo "Status :". $option->getStatus()."<br><br><br>";

}