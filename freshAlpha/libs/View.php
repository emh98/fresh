<?php
/**
 * View (class worker) :)
 * 
 * Libreria para las vistas.
 * 
 * Permite tener metodos generales para todas las vistas.
 * 
 * @author Emanuel Mateus Huepo
 * @package libs
 */
class View{

    /**
     * Constructor de la libreria de vistas
     */
    function __construct(){
        $this->mensaje = " ";
    }

    /**
     * Metodo que permite renderizar las vistas segun su nombre.
     *
     * @param string $name
     * @return void
     */
    function render($name){
        require 'views/'.$name.'.php';
    }
}