<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct()
    {
        $dsn = "mysql:host=127.0.0.1;dbname=web-php;charset=utf8mb4";
        $this->connection = new PDO($dsn, 'root', '');
    }

    public function query($sql, $params= [])
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ);



}
