<?php

/**
 * DataBase (class worker) :)
 * 
 * Libreria que permite realizar una conexion a la base de datos.
 * 
 * Permite tener metodos generales referentes a la base de datos.
 * 
 * @author Emanuel Mateus Huepo
 * @package libs
 * 
 */
class DataBase
{
    /**
     * El nombre del host en donde esta publicada la base de datos.
     *
     * @var string
     */
    private $host;

    /**
     * Nombre de la base de datos
     *
     * @var string
     */
    private $db;

    /**
     * Nombre del usuario para ingresar a la base de datos.
     *
     * @var string
     */
    private $user;

    /**
     * Contraseña que permite acceder a la base de datos
     *
     * @var string
     */
    private $password;
    
    /**
     * Constructor de la libreria de la base de datos.
     */
    function __construct(){

        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');

    }

    /**
     * funcion que permite la conexion a la base de datos.
     *
     * @return mixed
     */
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
