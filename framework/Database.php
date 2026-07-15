<?php

namespace Framework;

use PDO;
use PSpell\Config;

class Database
{
    private $connection;
    private $statement;

    public function __construct()
    {
        //$dsn = 'mysql:host=127.0.0.1;dbname=web-php;charset=utf8mb4';
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            config('host','localhost'),
            config('dbname','web'),
            config('charset')
        );

        //var_dump($dsn); die();

        $this->connection = new PDO($dsn, config('username'), config('password'), Config('options',[]));
    }
   
    public function query($sql, $params = [])
    {
        /* return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC); */
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function first()
    {
        return $this->statement->fetch();
    }

    public function firstOrFail()
    {
        $result = $this->first();
        if (!$result) {
            exit('404 Not Found');
        }
        return $result;
    }
}
