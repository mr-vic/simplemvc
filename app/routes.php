<?php

use Framework\Routing\Route;
use Framework\Routing\Router;

Router::addRoute(new Route('/hello', 'getHello', Route::METHOD_GET));