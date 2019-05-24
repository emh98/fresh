<?php

require_once "controllers/Errors.php";
/**
 * StartApp (class worker) :)
 * 
 * Libreria para los direcionamientos e iniciación de la app.
 * 
 * Permite redireccionar entre las paginas web.
 * Permite Iniciar la aplicacion web.
 * 
 * @author Emanuel Mateus Huepo
 * @package libs
 */
    class StartApp
    {
        /**
         * Constructor de la liberia de iniciacion de toda la app.
         */
        function __construct()
        {

            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url = rtrim($url,'/');
            $url = explode('/',$url);

            if(empty($url[0])){
                $archivoController = 'controllers/Main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('Main','Main');
                $controller->render();
                return false;
            }

            $archivoController = 'controllers/'.$url[0].'.php';

            if (file_exists($archivoController)) {

                require_once $archivoController;
                $controller = new $url[0];

                $nparam = sizeof($url);

                if ($nparam > 1) {
                    if ($nparam > 2) {
                        $param = [];
                        for($i = 2;$i<$nparam;$i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errors();
            }
        }
    }
    