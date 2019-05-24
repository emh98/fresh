<?php
/**
 * RegistroF (class worker) :)
 * 
 * Controlador de la segunda forma de registrar una factura.
 * 
 * Permite la interacción entre el modelo y la interface grafica.
 * Permite renderizar la vista de la pagina web de la factura registro.
 * permite conectar servicios especificos para la factura.
 * Permite registrar nuevas facturas.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class RegistroF extends Controller
{
    /**
     * Constructor del controlador de las segunda forma de registrar una factura.
     */
    function __construct(){

        parent::__construct();

    }

    /**
     * Renderiza la pagina de la aplicación web que permite una segunda forma
     * de registrar una factura.
     *
     * @return void
     */
    function render(){

        $this->view->render('registroF/index');

    }
}