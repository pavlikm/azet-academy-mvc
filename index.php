<?php

include "vendor/autoload.php";
define("ROOT", __DIR__);

$app = new \Azet\MVC\App\App();
$app->run();