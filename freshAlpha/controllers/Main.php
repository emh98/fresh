<?php

class Main extends Controller
{
    function __construct(){

        parent::__construct();
        //echo "<p>controlador main</p>";
    }

    function render(){
        $this->view->render('main/index');

    }
}
