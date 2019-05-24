<?php

/**
 * Factura (class worker) :)
 * 
 * Controlador de la factura
 * 
 * Permite la interacción entre el modelo y la interface grafica
 * Permite renderizar la vista de la pagina web de la factura.
 * permite conectar servicios especificos para la factura.
 * permite mandar la informacion de las listas de las facturas.
 * Permite registrar nuevas facturas.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class Factura extends Controller
{
    /**
     * Constructor del controlador de las facturas.
     */
    function __construct(){

        parent::__construct();
        $this->view->factura = [];
        $this->view->prenda = [];
        $this->view->dettalle = [];
        
    }

    /**
     * Permite renderizar la vista de las pagina web de las facturas.
     * 
     * Carga el modelo de las consultas.
     * trae tres listas(Factura, Prenda, Servicios) del modelo de las consultas.
     * renderiza el la vista de las facturas
     *
     * @return void
     */
    function render(){
        $this->loadModel('Consulta','Consulta');
        $facturas =  $this->Consulta->ListarFacturas();
        $prendas =  $this->Consulta->ListarPrendas();
        $servicios =  $this->Consulta->ListarServicios();
        $this->view->factura = $facturas;
        $this->view->prenda = $prendas;
        $this->view->servicio = $servicios;

        $this->view->render('factura/index');
    }

    /**
     * Registra una factura en la base de datos.
     * 
     * Carga los modelos de factura, cliente y detalle.
     * Captura los datos en el formulario con el metodo POST.
     *  realiza tres validaciones:
     *  1. verifica si el cliente es registrado.
     *  2. verifica si la factura ya exixte.
     *  3. si ya existe la factura valida si el detalle ya exixte.
     * Al finalizar mostrara el respectivo mensaje de cada validacion.
     *
     * @return void
     */
    function registrarFactura(){
        
        $this->loadModel('Cliente','Cliente');
        $this->loadModel('Factura','Factura');
        $this->loadModel('Detalle','Detalle');

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $codFactura = $_POST['codigoF'];
        $fecha = date("Y/m/d");
        $servicio = $_POST['codS'];
        $prenda = $_POST['codP'];
        $cantidad = $_POST['cantidad'];

        $mensaje = "";
        
        if($this->Cliente->RegistrarCliente(['cedula' => $cedula, 'nombre' => $nombre])){
            $mensaje =" Se Ingreso el Cliente Nuevo";
        }else{
            $mensaje = "Ya exite el cliente";
        }
        if($this->Factura->RegistrarFactura(['codF' => $codFactura, 'cedula' => $cedula, 'fecha' => $fecha])){
            if($this->Detalle->RegistrarDetalle(['codF' => $codFactura, 'codS' => $servicio, 'codP' => $prenda, 'cantidad' => $cantidad])){
            }else{
                $mensaje = "Error de Detalle";    
            }
        }else{
            $mensaje = "Ya exite La Factura";

            if($this->Detalle->RegistrarDetalle(['codF' => $codFactura, 'codS' => $servicio, 'codP' => $prenda, 'cantidad' => $cantidad])){
            }else{
                $mensaje = "Error de Detalle";    
            }
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }

    /**
     * Lista los detalles de la factura
     * 
     * Busca a través del codigo de la factura el detelle de la factura.
     *
     * @param mixed $codFactura
     * @return mixed
     */
    function listarDetalleC($codFactura1){
        $Consulta1 = new ConsultaModel();
        $respuesta = $Consulta1->ListarDetalle($codFactura1);
        return $respuesta;

    }
}