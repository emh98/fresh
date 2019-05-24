<?php

class Servicio extends Controller
{
    function __construct(){

        parent::__construct();
        
    }

    function render(){
        $this->view->render('servicio/index');
    }

    function buscarS(){
	$pCodigo = $_POST['parametro'];
	$parametro = array('pCodigo'=>$pCodigo);
    $respuesta = $this->loadService('agregaServicio')->call('buscarServicio', $parametro);
    //foreach($respuesta as $valor){
      //  print_r($valor);
    //}
    print_r($respuesta);
	}
}