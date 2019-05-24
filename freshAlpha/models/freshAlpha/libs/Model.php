<?php
/**
 * Model (class worker) :)
 * 
 * Libreria para los Metodos.
 * 
 * Permite tener metodos generales para todos los Metodos.
 * 
 * @author Emanuel Mateus Huepo
 * @package libs
 */
class Model{

    /**
     * Constructor de la libreria de los modelos.
     */
    function __construct(){
        $this->db = new DataBase();
    }
}