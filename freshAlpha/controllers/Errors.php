<?php

class Errors extends Controller
{
    function __construct(){

        parent::__construct();
        //echo "<p>No se pudp aceder a esta pagina</p>";
    }

    function render(){

        $this->view->render('errors/index');

    }
}
