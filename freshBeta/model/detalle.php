<?php
class Detalle
{
	private $pdo;
    
    public $cod_detalle;
    public $can_detalle;
    public $cod_factura;
    public $cod_prenda;
	public $cod_servicio;
	public $val_factura;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarDetalle()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM detalle");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerDetalle($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle WHERE cod_detalle = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarDetalle($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM detalle WHERE cod_detalle = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarDetalle($data)
	{
		try 
		{
			$sql = "UPDATE detalle SET can_detalle =?, cod_factura =?,cod_prenda =?, cod_servicio = ? 
				    WHERE cod_detalle = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->can_detalle, 
                        $data->cod_factura,
                        $data->cod_prenda,
                        $data->cod_servicio
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
				$hostname="localhost";
		$username="root";
		$password="";
		$dbname="fresh";

		mysql_connect($hostname,$username, $password);
		mysql_select_db($dbname);
		$sql = "UPDATE factura set val_factura = (SELECT SUM(val_servicio*can_detalle) FROM  servicio, detalle, prenda 
		where servicio.cod_servicio = detalle.cod_servicio and
			detalle.cod_factura = factura.cod_factura and
			prenda.cod_prenda = detalle.cod_prenda)";
		$resultado=mysql_query($sql);

	}

	public function RegistrarDetalle(Detalle $data)
	{
		try 
		{
		$sql = "INSERT INTO detalle (can_detalle,cod_factura, cod_prenda,cod_servicio) VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->can_detalle,
					$data->cod_factura,
                    $data->cod_prenda,
                    $data->cod_servicio                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		$hostname="localhost";
		$username="root";
		$password="";
		$dbname="fresh";

		$conexion= mysqli_connect($hostname,$username, $password,$dbname);
	
		$sql = "UPDATE factura set val_factura = (SELECT SUM(val_servicio*can_detalle) FROM  servicio, detalle, prenda 
		where servicio.cod_servicio = detalle.cod_servicio and
			detalle.cod_factura = factura.cod_factura and
			prenda.cod_prenda = detalle.cod_prenda)";
		$resultado=mysqli_query($conexion, $sql);


			

		
	}
	
}