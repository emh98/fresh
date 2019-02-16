<?php
class Factura
{
	private $pdo;
    
    public $cod_factura;
    public $cod_cliente;
    public $val_factura;
	public $fecha;

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
	public function ListarFactura()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM factura");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerFactura($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM factura WHERE cod_factura = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarFactura($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM factura WHERE cod_factura = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarFactura($data)
	{
		try 
		{
			$sql = "UPDATE factura SET cod_cliente          = ? 
				    WHERE cod_cliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nom_cliente, 
                        $data->cod_cliente
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistrarFactura(Factura $data)
	{
		try 
		{
		$sql = "INSERT INTO factura (cod_cliente,fecha, val_factura) VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->cod_cliente,
					$data->fecha,
					$data->val_factura
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}