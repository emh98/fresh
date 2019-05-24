<?php
include_once "models/ClienteModel.php";
include_once 'models/FacturaModel.php';
include_once 'models/ServicioModel.php';
include_once 'models/PrendaModel.php';
include_once 'models/DetalleModel.php';

/**
 * ClonsultaModel (class worker) :)
 * 
 * Modelo de las consultas.
 * 
 * Permite centralisar las listas de los modelos.
 * Permite buscar multiples objetos del modelo.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class ConsultaModel extends Model {

    /**
     * Constructor del modelo de consulta.
     */
    public function __construct(){
        parent::__construct();
    }


    /**
     * Obtiene un cliente apartir de la cedula dada por 
     * parametro.
     * 
     * Si encuentra lo que busca retorna un Cliente.
     * Si no encuetra lo que busca retorna un null para manejarlo despues como excepción.
     *
     * @param mixed $id
     * @return mixed
     */
    public function obtenerCliente($id){
        $item = new ClienteModel();

        $query = $this->db->connect()->prepare(constant('obtenerCliente'));
        try {
            $query->execute(['cedula' => $id]);

            while ($row = $query->fetch()) {
                $item->cod_cliente = $row['cedula'];
                $item->nom_cliente = $row['nombre'];

            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Obtiene una Fcatura apartir del codigo de la factura dada por 
     * parametro.
     * 
     * Si encuentra lo que busca retorna una Factura.
     * Si no encuetra lo que busca retorna un null para manejarlo despues como excepción.
     *
     * @param mixed $id
     * @return mixed
     */
    public function obtenerFactura($id){
        $item = new FacturaModel();

        $query = $this->db->connect()->prepare(constant('obtenerFactura'));
        try {
            $query->execute(['codF' => $id]);

            while ($row = $query->fetch()) {

                $item->cod_factura = $row['codF'];
                $item->cod_cliente = $row['codC'];
                $item->val_factura = $row['valor'];
                $item->fecha = $row['fecha'];

            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Obtiene un Detalle apartir del codigo del detalle dada por 
     * parametro.
     * 
     * Si encuentra lo que busca retorna un Detalle.
     * Si no encuetra lo que busca retorna un null para manejarlo despues como excepción.
     *
     * @param mixed $id
     * @return mixed
     */
    public function obtenerDetalle($id){
        $item = new DetalleModel();

        $query = $this->db->connect()->prepare(constant('obtenerDetalle'));
        try {
            $query->execute(['codD' => $id]);

            while ($row = $query->fetch()) {

                $item->cod_detalle = $row['codD'];
                $item->can_detalle = $row['canD'];
                $item->cod_factura = $row['codF'];
                $item->cod_prenda = $row['codP'];
                $item->cod_servicio = $row['codS'];
                $item->val_factura = $row['val'];

            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    /**
     * Obtiene una prenda apartir del codigo de la prenda dada por 
     * parametro.
     * 
     * Si encuentra lo que busca retorna una prenda.
     * Si no encuetra lo que busca retorna un null para manejarlo despues como excepción.
     *
     * @param mixed $id
     * @return mixed
     */
    public function obtenerPrenda($id){
        $item = new PrendaModel();

        $query = $this->db->connect()->prepare(constant('obtenerPrenda'));
        try {
            $query->execute(['codP' => $id]);

            while ($row = $query->fetch()) {

                $item->cod_prenda = $row['codP'];
                $item->nom_prenda = $row['nomP'];

            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    } 

    /**
     * Obtiene un servicio apartir del codigo del servicio dada por 
     * parametro.
     * 
     * Si encuentra lo que busca retorna una Servicio.
     * Si no encuetra lo que busca retorna un null para manejarlo despues como excepción.
     *
     * @param mixed $id
     * @return mixed
     */
    public function obtenerServicio($id){
        $item = new ServicioModel();

        $query = $this->db->connect()->prepare(constant('obtenerServicio'));
        try {
            $query->execute(['codS' => $id]);

            while ($row = $query->fetch()) {

                $item->cod_servicio = $row['codS'];
                $item->nom_servicio = $row['nomS'];
                $item->val_servicio = $row['val'];

            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }


    /**
     * Genera una lista de clientes.
     *
     * @return mixed
     */
    public function ListarCliente(){
        $items = [];

        try {
            $query = $this->db->connect()->query(constant('listarCliente'));

            while($row = $query->fetch()){
                $item = new ClienteModel();
                $item->cod_cliente = $row['cod_cliente'];
                $item->nom_cliente = $row['nom_cliente'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Genera una lista de facturas.
     *
     * @return mixed
     */
    public function ListarFacturas(){
        $items = [];

        try {
            $query = $this->db->connect()->query(constant('listarFactura'));

            while($row = $query->fetch()){
                $item = new FacturaModel();
                $item->cod_factura = $row['cod_factura'];
                $item->cod_cliente = $row['nom_cliente'];
                $item->fecha = $row['fecha'];
                $item->val_factura = $row['val_factura'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Genera una lista de servicios.
     *
     * @return mixed
     */
    public function ListarServicios(){
        $items = [];

        try {
            $query = $this->db->connect()->query(constant('listarServicio'));

            while($row = $query->fetch()){
                $item = new ServicioModel();
                $item->cod_servicio = $row['cod_servicio'];
                $item->nom_servicio = $row['nom_servicio'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Genera una lista de prendas.
     *
     * @return mixed
     */
    public function ListarPrendas(){
        $items = [];

        try {
            $query = $this->db->connect()->query(constant('listarPrenda'));

            while($row = $query->fetch()){
                $item = new PrendaModel();
                $item->cod_prenda = $row['cod_prenda'];
                $item->nom_prenda = $row['nom_prenda'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    /**
     * Genera una lista con reportes apartir de una fecha dada por parametro.
     *
     * @return mixed
     */
    public function ListarReporte($inicial){
        $items = [];

        try {
            $query = $this->db->connect()->query("
            SELECT cod_factura, sum(val_factura) as total
            FROM factura
            WHERE 
                fecha >= '".$inicial."' AND 
                fecha <= DATE_ADD('".$inicial."' , INTERVAL 30 DAY) 
                group by cod_factura with rollup
            
            ");

            while($row = $query->fetch()){
                $item = new FacturaModel();
                $item->cod_factura = $row['cod_factura'];
                $item->val_factura = $row['total'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            //return [];
        }
    }

    /**
     * Genera una lista de detalles apartir del codigo de la factura 
     * pasada por parametro.
     *
     * @return mixed
     */
    public function ListarDetalle($param){
        $items = [];
    
        try {
            $query = $this->db->connect()->query('select prenda.nom_prenda, SUM(detalle.can_detalle) as cantidad, SUM(detalle.can_detalle*servicio.val_servicio) as total
            from prenda, factura, servicio, detalle
            where prenda.cod_prenda = detalle.cod_prenda and
                  servicio.cod_servicio = detalle.cod_servicio and
                  factura.cod_factura = detalle.cod_factura and
                  factura.cod_factura = '.$param.'
                  group by prenda.nom_prenda with rollup;');
    
            while($row = $query->fetch()){
                $item = new DetalleModel();
                $item->cod_prenda = $row['nom_prenda'];
                $item->can_prenda = $row['cantidad'];
                $item->val_factura = $row['total'];
    
                array_push($items, $item);
            }
    
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}




?>