<?php

namespace App\Services;

use ReflectionMethod;
use App\Services\Request;

/**
 * Class Route
 *
 * This class handles routing in the application.
 */
class Route
{
    private static $routes = []; // Array to store the registered routes
    private static $currentRoute; // Current route being registered
    private static $routeGroup = [
        'prefix' => '',
        'as' => '',
        'middleware' => [],
    ]; // Route group configuration

    /**
     * Register a GET route.
     *
     * @param string $uri The URI pattern for the route
     * @param string $controller The controller class for the route
     * @param string $action The method name of the controller to be called
     * @param string $method The HTTP method for the route (default: 'GET')
     * @param array $middleware The middleware for the route (default: [])
     * @return Route Returns a Route instance
     */
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

    /**
     * Register a POST route.
     *
     * @param string $uri The URI pattern for the route
     * @param string $controller The controller class for the route
     * @param string $action The method name of the controller to be called
     * @param string $method The HTTP method for the route (default: 'POST')
     * @param array $middleware The middleware for the route (default: [])
     * @return Route Returns a Route instance
     */
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

    /**
     * Set the name for the current route.
     *
     * @param string $name The name of the route
     * @return Route Returns the current Route instance
     */
    public function name($name)
    {
        self::$currentRoute['name'] = self::$routeGroup['as'] ? self::$routeGroup['as'] . '.' . $name : $name;
        return $this;
    }

    /**
     * Handle the incoming request and execute the appropriate controller method.
     *
     * @return void
     */
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

                    $reflectionMethod = new ReflectionMethod($controllerClass, $action);
                    $parameters = $reflectionMethod->getParameters();

                    $arguments = [];

                    foreach ($parameters as $parameter) {
                        if ($parameter->getName() === 'request') {
                            $arguments[] = new Request();
                        } elseif (array_key_exists($parameter->getName(), $params)) {
                            $arguments[] = $params[$parameter->getName()];
                        }
                    }

                    $controller->$action(...$arguments);

                    return;
                }
            }
        }

        // If no route matches, send a 404 Not Found response
        return view('errors.404');
    }

    /**
     * Get the registered routes.
     *
     * @return array Returns the registered routes
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Set the prefix for the route group.
     *
     * @param string $prefix The prefix for the group
     * @return Route Returns a Route instance
     */
    public static function prefix($prefix)
    {
        self::$routeGroup['prefix'] = $prefix;

        return new static();
    }

    /**
     * Set the alias for the route group.
     *
     * @param string $as The alias for the group
     * @return Route Returns a Route instance
     */
    public static function as($as)
    {
        self::$routeGroup['as'] = $as;

        return new static();
    }

    /**
     * Set the middleware for the route group.
     *
     * @param mixed $middleware The middleware for the group
     * @return Route Returns a Route instance
     */
    public static function middleware($middleware)
    {
        self::$routeGroup['middleware'] = array_merge(self::$routeGroup['middleware'], (array) $middleware);

        return new static();
    }

    /**
     * Define a route group.
     *
     * @param \Closure $callback The callback function defining the route group
     * @return void
     */
    public static function group(\Closure $callback)
    {
        $previousGroup = self::$routeGroup;

        call_user_func($callback);

        self::$routeGroup = $previousGroup;
    }
}
