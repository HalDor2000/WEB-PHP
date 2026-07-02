<?php

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\PostController;
use App\Controllers\LinkController;  // Import the Link


$router->get('/',             [HomeController::class, 'index']);
$router->get('/about',        [AboutController::class, 'index']);
$router->get('/post',         [PostController::class, 'show']);

$router->get('/links',        [LinkController::class, 'index']); 
$router->get('/links/create', [LinkController::class, 'create']);
$router->get('/links/edit',     [LinkController::class, 'edit']);
$router->put('/links/update',     [LinkController::class, 'update']);
$router->post('/links/store', [LinkController::class, 'store']); 

$router->delete('/links/delete', [LinkController::class, 'destroy']);





