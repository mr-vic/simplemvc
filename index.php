<?php

use Framework\Routing\Request;
use Framework\Routing\Router;

require_once "vendor/autoload.php";

echo "<pre>";
echo (new Router((new Request())))->getContent();
echo "</pre>";