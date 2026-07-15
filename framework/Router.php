<?php

namespace Framework;

use Framework\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function __construct()
    {
        $this->loadRoutes('web');
    }

    public function get(string $uri, array $action, string|null $middleware = null)
    {
        $this->routes['GET'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function post(string $uri, array $action, string|null $middleware = null)
    {
        $this->routes['POST'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function delete(string $uri, array $action, string|null $middleware = null)
    {
        $this->routes['DELETE'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function put(string $uri, array $action, string|null $middleware = null)
    {
        $this->routes['PUT'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function run()
    {

        /*
        $requestUri = $_SERVER['REQUEST_URI']; devuleve el url con parametro : string(10) "/post?id=5"
        */
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        /* 
        PHP_URL_QUERY accede el parametro de la ruta: string(4) "id=5" 
        PHP_URL_PATH solo devuelve la ruta string(5) "/post"
        */

        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //GET, /POST, /DELETE

        $action = $this->routes[$method][$uri]['action'] ?? null;

        //echo '<pre>';
        //var_dump($this->routes);
        //die();


        if (!$action) {
            exit ('404 Route Not Found : ' . $method . ' ' . $uri);
        }

        $middleware = $this->routes[$method][$uri]['middleware'] ?? null;

        if ($middleware) {
            Middleware::run(new $middleware());
        }

        [$controller, $method] = $action;

        (new $controller())->$method();
    }

    protected function loadRoutes(string $file)
    {
        $router = $this;
        $filePath = __DIR__ . '/../routes/' . $file . '.php';
        require $filePath;
    }
}
