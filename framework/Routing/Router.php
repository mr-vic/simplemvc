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
        foreach (self::$routes as $route){
            if($route->getType() == $this->request->getType()&& preg_match($route->getMask(), $this->request->getPath())){
                $exec_route = $route;
            }
        }
        //var_dump($exec_route->getParams());
        //var_dump($exec_route->getMask());
        if($exec_route){
            $action = explode('@',$exec_route->getAction());
            if (isset($action[0]) && isset($action[1])){
                $controller_name = "App\MVC\Controllers\\".$action[0];
                $method_name = $action[1];
                $controller = new $controller_name();
                if(method_exists($controller, $method_name))
                {
                    $rm = new \ReflectionMethod($controller_name,$method_name);
                    $params = [];
                    $params_to_controller = ['request' => $this->request];
                    preg_match_all($exec_route->getMask(), $this->request->getPath(),$params);
                    foreach ($exec_route->getParams() as $key => $param){
                        $params_to_controller[$param] = $params[$key+1][0];
                    }
                    return $rm->invokeArgs($controller, $params_to_controller);
                }
    
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
