<?php

class Router
{
    protected $routes = [];
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $path = trim($path, '/');
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = trim($this->request->getPath(), '/');
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false)
        {
            return '404 - Not found';
        }

//        if (is_string($callback))
//        {
//            return $this->renderView($callback);
//        }

        return call_user_func($callback);
    }

//    public function renderView($view)
//    {
//        include_once 'app/'.$view;
//    }
}