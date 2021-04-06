<?php

namespace app\core;

class Router
{   
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = [$callback];
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = [$callback];
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "Not Found";
        }

        return call_user_func($callback[0]);
    }
}