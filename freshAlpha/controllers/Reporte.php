<?php

class Reporte extends Controller
{
    function __construct(){

        parent::__construct();
        $this->view->reporte = [];
        //echo "<p>controlador main</p>";
    }

    function render(){
        $this->view->render('reporte/index');
    }

    function renderBus(){
        $this->loadModel('consulta');
        $fecha = $_POST['fecha'];

        $reportes = $this->consulta->ListarReporte($fecha);
        $this->view->reporte = $reportes;

        $this->render();

    }
}