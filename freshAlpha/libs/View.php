<?php

class View{

    function __construct(){
        $this->mensaje = " ";
        //echo "<p>Vista Base</p>";
    }

    function render($name){
        require 'views/'.$name.'.php';
    }
}