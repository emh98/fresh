<?php
/**
 * Controller (class worker) :)
 * 
 * Libreria para los controladores
 * 
 * Permite tener metodos generales para todos los controladores.
 * 
 * @author Emanuel Mateus Huepo
 * @package libs
 */
class Controller{

    /**
     * Constructor de la libreria de los controladores.
     */
    function __construct(){
        $this->view = new View();
    }

    /**
     * Carga los modelos de la aplicacion apartir del nombre
     * dado por parametro y darle un nombre al parametro deseado para podr nombralo.
     *
     * @param string $model
     * @param string $nomV
     * @return void
     */
    function loadModel($model,$nomV){
        $url = 'models/'. $model .'Model.php';

        if (file_exists($url)) {

            require $url;

            $modelName = $model.'Model';
            $this->$nomV = new $modelName();
        }
    }

    /**
     * Carga los servicios web.
     * 
     * Apartir de el nombre de laconstante como parametro optendremos el servicio deseado.
     *
     * @param mixed $nomServ
     * @return void
     */
    function loadService($nomServ){
        $servicio = new nusoap_client(constant($nomServ),false);
        return $servicio;
    }
}