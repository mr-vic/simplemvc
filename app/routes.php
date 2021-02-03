<?php

use Framework\Routing\Route;
use Framework\Routing\Router;

Router::addRoute(new Route('hello', 'HelloController@index', Route::METHOD_GET));
Router::addRoute(new Route('user/{user_name}/group/{group_name}', 'HelloController@data', Route::METHOD_GET));
Router::addRoute(new Route('todos', 'TodosController@index', Route::METHOD_GET));