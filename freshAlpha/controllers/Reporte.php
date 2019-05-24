<?php
/**
 * Reporte (class worker) :)
 * 
 * Controlador del Reporte
 * 
 * Permite la interacción entre el modelo y la interface grafica
 * Permite renderizar la vista de la pagina web del reporte.
 * permite mandar la informacion de la consulta de un reporte por fecha.
 * Permite registrar nuevas facturas.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class Reporte extends Controller
{
    /**
     * Contructor del controlador de los reportes
     */
    function __construct(){

        parent::__construct();
        $this->view->reporte = [];

    }

    /**
     * Renderiza la vsita de la pagina wed de los reportes.
     *
     * @return void
     */
    function render(){
        $this->view->render('reporte/index');
    }

    /**
     * Renderiza la lista de información que trae el reporte en un afecha determinada.
     *
     * @return void
     */
    function renderBus(){
        $this->loadModel('Consulta','Consulta');
        $fecha = $_POST['fecha'];

        $reportes = $this-> Consulta->ListarReporte($fecha);
        $this->view->reporte = $reportes;

        $this->render();

    }
}