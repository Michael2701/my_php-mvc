<?php 
namespace app;

class Router {

    private static $routes = [];

    private static function route($path, $ctrl_method)
    {
        return [
            "verb"     => "GET",
            "controller" => $ctrl_method[0], 
            "method"     => $ctrl_method[1]
        ];
    }

    public static function get($path, $ctrl_method)
    {
        $route = self::route($path, $ctrl_method);
        self::$routes[$path] = $route;
    }

    public static function post($path, $ctrl_method)
    {
        $route = self::route($path, $ctrl_method);
        $route["verb"] = "POST";
        self::$routes[$path] = $route;
    }

    public static function routes_list()
    {
        foreach(self::$routes as $path => $data)
        {
            echo "['$path'=> verb:{$data['verb']}, controller: {$data['controller']}, method: {$data['method']}]<br>";
        }
    }

    public static function navigate($callback)
    {
        $reqUrl = $_SERVER['REQUEST_URI'];
        $reqMet = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes as  $name => $route) {
            $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($name)) . "$@D";
            $matches = Array();

            if($reqMet == $route['verb'] && preg_match($pattern, $reqUrl, $matches)) 
            {
                array_shift($matches);
                $class = "app\controllers\\".$route["controller"]; 

                return call_user_func_array(
                    [
                        new $class, 
                        $route["method"]
                    ], 
                    $matches
                );
            }
        }
        $callback();
    }
}
