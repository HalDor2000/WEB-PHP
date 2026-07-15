
<?php

require __DIR__ . '/../bootstrap.php';

/* var_dump(
    password_hash('password', PASSWORD_DEFAULT),
);

die(); */


/* 
db()->query('INSERT INTO users (name, email, password) VALUES  (:name, :email, :password)', [
    'name' => 'Test user',
    'email' => 'i@test.com',
    'password' => password_hash('password', PASSWORD_DEFAULT),
]); */


use Framework\Router;

$router = new Router();

$router->run(); 
