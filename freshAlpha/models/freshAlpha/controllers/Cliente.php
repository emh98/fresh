<?php

/**
 * Cliente (class worker) :)
 * 
 * Controlador de cliente
 * 
 * Permite la interacción entre el modelo y la interface grafica
 * Permite renderizar la vista de la pagina web del cliente.
 * permite conectar servicios especificos para cliente.
 * permite mandar la informacion de las listas de los clientes.
 * 
 * @author Emanuel Mateus Huepo
 * @package controllers
 * 
 */
class Cliente extends Controller
{
    /**
     * Construlle el controlador del cliente
     */
    function __construct(){

        parent::__construct();
        $this->view->cliente = [];
        
    }

    /**
     * Permite renderizar la vista del cliente.
     * 
     * Carga el modelo de consulta.
     * Al modelo de la consulta pidela lista de los clientes.
     * Renderiza la vista del cliente.
     *
     * @return void
     */
    function render(){
        $this->loadModel('Consulta','Consulta');
        $clientes =  $this->Consulta->ListarCliente();
        $this->view->cliente = $clientes;
        $this->view->render('cliente/index');

    }

    /**
     * A través de un servicio web  optiene un numero de cliente,
     * Si el servicio esta caido muestra un mensaje que el mensaje esta caido.
     * 
     * @param integer $numeroDC
     * @return string
     */
    function noCliente(int $numeroDC){
        $num1 = $numeroDC;
        $parametros = array('num1'=>$num1); 
        $respuesta =  $this->loadService('servicioSuma')->call('suma',$parametros);
        if($respuesta <= 0){
            return 'El servicio esta caido';
        }else{
            return $respuesta;
        }   
    }
}