<?php
include_once "models/ClienteModel.php";
include_once 'models/FacturaModel.php';
include_once 'models/ServicioModel.php';
include_once 'models/PrendaModel.php';
include_once 'models/DetalleModel.php';
class ConsultaModel extends Model {

    public function __construct(){
        parent::__construct();
    }


    public function obtenerCliente($id){
        $item = new ClienteModel();

        $query = $this->db->connect()->prepare("SELECT * FROM cliente WHERE cod_cliente = :cedula");
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

    public function obtenerFactura($id){
        $item = new FacturaModel();

        $query = $this->db->connect()->prepare("SELECT * FROM factura WHERE cod_factura = :codF");
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

    public function obtenerDetalle($id){
        $item = new DetalleModel();

        $query = $this->db->connect()->prepare("SELECT * FROM detalle WHERE cod_detalle = :codD");
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
    
    public function obtenerPrenda($id){
        $item = new PrendaModel();

        $query = $this->db->connect()->prepare("SELECT * FROM prenda WHERE cod_prenda = :codP");
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

    public function obtenerServicio($id){
        $item = new ServicioModel();

        $query = $this->db->connect()->prepare("SELECT * FROM sevicio WHERE cod_servicio = :codS");
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


    public function ListarCliente(){
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM cliente");

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

    public function ListarFacturas(){
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT cod_factura, nom_cliente, fecha, val_factura 
                                                    FROM factura, cliente
                                                    WHERE factura.cod_cliente = cliente.cod_cliente");

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
    public function ListarServicios(){
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT cod_servicio, nom_servicio FROM servicio");

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
    public function ListarPrendas(){
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM prenda");

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
            return [];
        }
    } 
}


?>