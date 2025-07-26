<?php

namespace App\Router;
class Router
{
    private static $routes = [];


    public static function get($uri, $controllerMethod)
    {
        self::$routes['GET'][$uri] = $controllerMethod;
    }

    public static function post($uri, $controllerMethod)
    {
        self::$routes['POST'][$uri] = $controllerMethod;
    }

    public static function delete($uri, $controllerMethod)
    {
        self::$routes['DELETE'][$uri] = $controllerMethod;
    }

    public static function patch($uri, $controllerMethod)
    {
        self::$routes['PATCH'][$uri] = $controllerMethod;
    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = strtok($path, '?');
        $path = rtrim($path, '/') ?: '/';


        if (isset(static::$routes[$method][$path])) {
            $handler = static::$routes[$method][$path];
            return static::executeHandler($handler);
        }

        foreach (static::$routes[$method] as $route => $handler) {
            if (strpos($route, '{') === false) continue;
            $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                return static::executeHandler($handler, $matches);
            }
        }

        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        return;
    }


    private static function executeHandler($handler, $params = [])
    {
        if (is_string($handler)) {
            list($controller, $method) = explode('@', $handler);
            return $controller::$method(...$params);
        } elseif (is_callable($handler)) {
            return $handler(...$params);
        }
        return [
            'status' => false,
            'message' => 'Invalid handler'
        ];
    }
}