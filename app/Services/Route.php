<?php

namespace App\Services;

class Route
{
    private static $routes = [];
    private static $currentRoute;

    public static function get($uri, $controller, $action, $method = 'GET', $middleware = [])
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
            'name' => null,
        ];

        // Set the current route to the newly added route
        self::$currentRoute = &self::$routes[count(self::$routes) - 1];

        // Return the Route object to allow chaining
        return new static();
    }

    public static function post($uri, $controller, $action, $method = 'POST', $middleware = [])
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function name($name)
    {
        // Set the name of the current route
        self::$currentRoute['name'] = $name;

        // Return the Route object to allow chaining
        return $this;
    }

    public static function handle()
    {
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['uri'] === $requestURI && $route['method'] === $requestMethod) {
                $controllerClass = $route['controller'];
                $action = $route['action'];

                $controller = new $controllerClass();
                $controller->$action();
                return;
            }
        }

        // If no route matches, send a 404 Not Found response
        return view('errors.404');
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}
