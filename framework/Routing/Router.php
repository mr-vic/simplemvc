<?php

namespace Framework\Routing;

class Router
{
    private static $routes = [];
    private $request;

    /**
     * Router constructor
     *
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getContent()
    {
        $exec_route = null;
        foreach (self::$routes as $route) {
            /* @var Route $route */
            if($route->getPath() == $this->request->getPath() && $route->getType() == $this->request->getType()){
                $exec_route = $route;
            }
        }
        if($exec_route){
            $action = explode('@',$exec_route->getAction());
            if (isset($action[0]) && isset($action[1])){
                $controller_name = "App\MVC\Controllers\\".$action[0];
                $method_name = $action[1];
                $controller = new $controller_name();
                if(method_exists($controller, $method_name)) return $controller->$method_name();
                return "Метод ".$method_name." не найден";
            }
            else return "Контроллер не найден";
        }
        return "Маршрут не найден";
    }

    public static function addRoute($route)
    {
        array_push(self::$routes, $route);
    }
}
