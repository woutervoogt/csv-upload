<?php

namespace App\Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function get($uri, $controller, array $middleware = [])
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function post($uri, $controller, array $middleware = [])
    {
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            $routeData = $this->routes[$requestType][$uri];
            if (isset($routeData['middleware']) && $routeData['middleware'] !== false) {
                foreach ($routeData['middleware'] as $middleWare) {
                    new $middleWare();
                }
            }

            return $this->callAction(
                ...explode('@', $routeData['controller'])
            );
        }
    
        throw new \Exception("Can not find the route for this URI");
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\Controllers\\$controller";

        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new \Exception("$controller does not respond to the $action action");
        }
        
        return $controller->$action();
    }
}
