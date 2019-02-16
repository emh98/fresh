<?php
class cliente
{
	private $pdo;
    
    public $cod_cliente;
    public $nom_cliente;


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

	public function ListarCliente()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM cliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerCliente($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM cliente WHERE cod_cliente = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

	public function EliminarCliente($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM cliente WHERE cod_cliente = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarCliente($data)
	{
		try 
		{
			$sql = "UPDATE cliente SET nom_cliente          = ? 
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

	public function RegistrarCliente(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO cliente (nom_cliente) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nom_cliente
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}