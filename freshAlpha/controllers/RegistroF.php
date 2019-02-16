<?php

class RegistroF extends Controller
{
    function __construct(){

        parent::__construct();
        //echo "<p>controlador main</p>";
    }
    function render(){

        $this->view->render('registroF/index');

    }
}