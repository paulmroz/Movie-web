<?php

namespace App\Core;

class Router
{
    protected $routes = [

        'GET' => [],

        'POST' => []

    ];


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public static function load($file)
    {
        $router = new static ;

        require $file;

        return $router;
    }

    public function direct($uri, $requestType)
    {
        try {
            if (array_key_exists($uri, $this->routes[$requestType])) {
                return $this->routes[$requestType][$uri];
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
