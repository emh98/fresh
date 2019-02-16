<?php

class DataBase
{
    private $host;
    private $db;
    private $user;
    private $password;
    
    function __construct(){

        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');

    }

    function connect(){

        try {
            $connection = "mysql:host=". $this->host . ";dbname=". $this->db;
            $options = [

                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false, 

            ];

            $pdo = new PDO($connection,$this->user,$this->password, $options);

            return $pdo;

        } catch (PDOException $e) {
            print_r('Error connection: '. $e->getMessage());
        }
    }
}
