<?php
namespace App\Services;

class Route {
    private static $routes = [];
    private static $controllerNamespace = 'App\Controllers\\';

    public static function add($uri, $controller, $action, $method = 'GET', $middleware = []) {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public static function handle() {
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['uri'] === $requestURI && $route['method'] == $requestMethod) {
                $controllerClass = self::$controllerNamespace.$route['controller'];
                $action = $route['action'];

                $controller = new $controllerClass();
                $controller->$action();
                return;
            }
            echo '404 Not Found';
        }
    }
}