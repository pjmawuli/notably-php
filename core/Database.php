<?php

namespace core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $user = 'root', $password = '')
    {
        // a mysql dsn
        $dsn = 'mysql:' . http_build_query($config['database'], '', ';');

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params)
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        $response = $this->statement->fetch();
        return $response;
    }

    public function findOrFail()
    {
        $response = $this->find();
        if (!empty($response)) {
            return $response;
        } else {
            abort();
        }
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}
