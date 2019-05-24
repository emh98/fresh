<?php
/**
 * Main (class worker) :)
 * 
 * Controlador del Main
 * 
 * Permite la primera interaccion en la pagina web, mostrando el index
 * de la primera visualisacion del usuario.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class Main extends Controller
{
    /**
     * Constructor del controlador del Main
     */
    function __construct(){

        parent::__construct();
    }

    /**
     * Renderiza la primera pagina web de la aplicación.
     *
     * @return void
     */
    function render(){
        $this->view->render('main/index');

    }
}
