<?php

class Cliente extends Controller
{
    function __construct(){

        parent::__construct();
        $this->view->cliente = [];
        
    }

    function render(){
        $this->loadModel('consulta');
        $clientes =  $this->consulta->ListarCliente();
        $this->view->cliente = $clientes;
        $this->view->render('cliente/index');
    }
}