<?php

use Framework\Database;

if (!function_exists('root_path')) {
    function root_path(string $path): string
    {
        //        return __DIR__ . '/../';  hace lo mismo que dirname(__DIR__), pero mas resumido
        // return dirname(__DIR__);   retorna el directorio raiz de la ruta que da __DIR__

        return dirname(__DIR__) . '/' . normalize_path($path);
    }
}

if (!function_exists('normalize_path')) {
    function normalize_path(string $path): string
    {
        return trim($path, '/');
    }
}

if (!function_exists('view')) {
    function view(string $view, array $data = []): void
    {
        extract($data);
        $filepath =   root_path("resources/$view.template.php");
        require $filepath;
    }
}

if (!function_exists('old')) {
    function old(string $key, mixed $default = ''): mixed
    {
        return $_POST[$key] ?? $default;
    }
}

if (!function_exists('requestIs')) {
    function requestIs(string $uri): string
    {
        return $_SERVER['REQUEST_URI'] === '/' . normalize_path($uri)
            ? 'bg-gray-900 text-white'
            : 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
}

if (!function_exists('config')) {
    function config(string $key, mixed $default = null): mixed
    {
        $config = require root_path("config/app.php");

        return $config[$key] ?? $default;
    }
}

if (!function_exists('redirect')) {
    function redirect(string $uri): void
    {
        header('Location: /' . normalize_path($uri));
        exit;
    }
}

if (!function_exists('db')) {
    function db(): Database
    {
        static $db = null;

        if ($db === null) {
            $db = new Database();
        }
        return $db;
    }
}

if (!function_exists('resource_path')) {

    function resource_path(string $path): void
    {
        require root_path("resources/partials/$path.php");
    }
}

if (!function_exists('isAuthenticated')) {


    function isAuthenticated(): bool

    {
        return (bool) ($_SESSION['user'] ?? false);

    }
}

if (!function_exists('back')) {

    function back(): void
    {
        header('Location: ' . $_SERVER['HTTP_REFERER'] ?? '/');
        exit;
    }
}
