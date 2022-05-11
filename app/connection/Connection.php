<?php

namespace App\Connection;

use PDO;
use PDOException;

class Connection {

    const HOST ='localhost:3306';
    const NAME ='databse_name';
    const USER ='root';
    const PASS ='root'; ##password

    private $connection;

    public function __construct()
    {
        $this->setConnection();
    }

    public function getConnection(){
        return $this->connection;
    }

    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';',self::USER,self::PASS);

            $this->connection->query("CREATE DATABASE IF NOT EXISTS " . self::NAME);
            $this->connection->query("use " . self::NAME);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }
}