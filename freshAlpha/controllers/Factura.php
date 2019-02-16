<?php

class Factura extends Controller
{
    public $detalleT = array();
    function __construct(){

        parent::__construct();
        $this->view->factura = [];
        $this->view->prenda = [];
        $this->view->servicio = [];
        
    }

    function render(){
        $this->loadModel('consulta');
        $facturas =  $this->consulta->ListarFacturas();
        $prendas =  $this->consulta->ListarPrendas();
        $servicios =  $this->consulta->ListarServicios();
        $this->view->factura = $facturas;
        $this->view->prenda = $prendas;
        $this->view->servicio = $servicios;
        $this->view->render('factura/index');
    }


    function registrarFactura(){
        
        $this->loadModel('cliente');
        $this->loadModel('factura');
        $this->loadModel('detalle');

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $codFactura = $_POST['codigoF'];
        $fecha = date("Y/m/d");
        $servicio = $_POST['codS'];
        $prenda = $_POST['codP'];
        $cantidad = $_POST['cantidad'];

        $mensaje = "";
        
        //if($this->cliente->ObtenerCliente($cedula) == false){
        if($this->cliente->RegistrarCliente(['cedula' => $cedula, 'nombre' => $nombre])){
            $mensaje =" Se Ingreso el Cliente Nuevo";
        }else{
            $mensaje = "Ya exite el cliente";
        }
        if($this->factura->RegistrarFactura(['codF' => $codFactura, 'cedula' => $cedula, 'fecha' => $fecha])){
            if($this->detalle->RegistrarDetalle(['codF' => $codFactura, 'codS' => $servicio, 'codP' => $prenda, 'cantidad' => $cantidad])){
            }else{
                $mensaje = "Error de Detalle";    
            }
        }else{
            $mensaje = "Ya exite La Factura";

            if($this->detalle->RegistrarDetalle(['codF' => $codFactura, 'codS' => $servicio, 'codP' => $prenda, 'cantidad' => $cantidad])){
            }else{
                $mensaje = "Error de Detalle";    
            }
        }
        //}

        $this->view->mensaje = $mensaje;
        $this->render();
    }
}