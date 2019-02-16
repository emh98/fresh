<?php
require_once 'model/database.php';

$controllerPrenda = 'prenda';


// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controllerPrenda.controller.php";
    $controllerPrenda = ucwords($controllerPrenda) . 'Controller';
    $controllerPrenda = new $controllerPrenda;
    $controllerPrenda->IndexPrenda();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controllerPrenda = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controllerPrenda.controller.php";
    $controllerPrenda = ucwords($controllerPrenda) . 'Controller';
    $controllerPrenda = new $controllerPrenda;
    
    // Llama la accion
    call_user_func( array( $controllerPrenda, $accion ) );
}