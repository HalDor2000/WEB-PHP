
<?php

require __DIR__ . '/../framework/Database.php';
$db= new Database();

$routes = require __DIR__ . '/../routes/web.php';


//$requestUri = $_SERVER['REQUEST_URI']; devuleve el url con parametro : string(10) "/post?id=5"
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
/* PHP_URL_QUERY accede el parametro de la ruta: string(4) "id=5" 
PHP_URL_PATH solo devuelve la ruta string(5) "/post" */

$route = $routes[$requestUri] ?? null;
if ($route) {
    require __DIR__ . '/../' . $route;

} else {
    exit('404 Not Found');
}
 