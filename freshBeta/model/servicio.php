<?php
class Servicio
{
	private $pdo;
    
    public $cod_servicio;
	public $nom_servicio;
	public $val_servicio;


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

	public function ListarServicio()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM servicio");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerServicio($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM servicio WHERE cod_servicio = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarServicio($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM servicio WHERE cod_servicio = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarServicio($data)
	{
		try 
		{
			$sql = "UPDATE servicio SET nom_servicio = ?, val_servicio = ? 
				    WHERE cod_servicio = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->nom_servicio,
						$data->val_servicio,						
						$data->cod_servicio
						
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistrarServicio(Servicio $data)
	{
		try 
		{
		$sql = "INSERT INTO servicio (nom_servicio, val_servicio) VALUES (?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->nom_servicio,
					$data->val_servicio
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}