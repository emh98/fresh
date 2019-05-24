<?php
/**
 * Errors (class worker) :)
 * 
 * Controlador de errores
 * 
 * Permite la generacion de errores para la vista
 * Permite renderizar la vista de la pagina web de ERROE 404 o una pagina 
 * que no exixte.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class Errors extends Controller
{
    /**
     * Constructor del controlador de los errores
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * renderiza la pagina de error 404 o que la pagina buscada no existe.
     *
     * @return void
     */
    function render(){
        $this->view->render('errors/index');
    }
}
