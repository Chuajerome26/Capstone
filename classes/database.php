<?php

class Database
{
    private $dbServername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $connection;

    public function __construct( ) {
        $this->connection = new PDO("mysql:host=$this->dbServername;dbname=capstone", $this->dbUsername, $this->dbPassword);

       // set the PDO error mode to exception
       $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
   }


    public function getConnection() {
       return $this->connection;
   }
}