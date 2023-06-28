<?php

namespace App\Services;

class Route
{
    private static $routes = [];
    private static $currentRoute;
    private static $routeGroup = [
        'prefix' => '',
        'as' => '',
        'middleware' => [],
    ];

    public static function get($uri, $controller, $action, $method = 'GET', $middleware = [])
    {
        $route = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
            'name' => null,
            'params' => [],
        ];

        if (!empty(self::$routeGroup['prefix'])) {
            // If there is an active route group, prepend the group prefix to the URI
            $prefix = self::$routeGroup['prefix'];
            $route['uri'] = $prefix . $uri;
        }

        self::$routes[] = $route;
        self::$currentRoute = &self::$routes[count(self::$routes) - 1];

        return new static();
    }

    public static function post($uri, $controller, $action, $method = 'POST', $middleware = [])
    {
        $route = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
            'name' => null,
            'params' => [],
        ];

        if (!empty(self::$routeGroup['prefix'])) {
            // If there is an active route group, prepend the group prefix to the URI
            $prefix = self::$routeGroup['prefix'];
            $route['uri'] = $prefix . $uri;
        }

        self::$routes[] = $route;
        self::$currentRoute = &self::$routes[count(self::$routes) - 1];

        return new static();
    }

    public function name($name)
    {
        self::$currentRoute['name'] = self::$routeGroup['as'] ? self::$routeGroup['as'] . '.' . $name : $name;
        return $this;
    }

    public static function handle()
    {
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod) {
                $pattern = '#^' . preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $route['uri']) . '$#';
                if (preg_match($pattern, $requestURI, $matches)) {
                    $controllerClass = $route['controller'];
                    $action = $route['action'];

                    $params = array_intersect_key($matches, array_flip(array_filter(array_keys($matches), 'is_string')));

                    $controller = new $controllerClass();
                    $controller->$action(...array_values($params));

                    return;
                }
            }
        }

        // If no route matches, send a 404 Not Found response
        return view('errors.404');
    }


    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function prefix($prefix)
    {
        self::$routeGroup['prefix'] = $prefix;

        return new static();
    }

    public static function as($as)
    {
        self::$routeGroup['as'] = $as;

        return new static();
    }

    public static function middleware($middleware)
    {
        self::$routeGroup['middleware'] = array_merge(self::$routeGroup['middleware'], (array) $middleware);

        return new static();
    }

    public static function group(\Closure $callback)
    {
        $previousGroup = self::$routeGroup;

        call_user_func($callback);

        self::$routeGroup = $previousGroup;
    }
}
