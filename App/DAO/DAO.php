<?php

namespace App\DAO;

use \PDO;

abstract class DAO 
{
    protected $conn;

    public function __construct()
    {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        $this->conn = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']);
    }
}