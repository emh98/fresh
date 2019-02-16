<?php
class Prenda
{
	private $pdo;
    
    public $cod_prenda;
    public $nom_prenda;


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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM prenda");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM prenda WHERE cod_prenda = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM prenda WHERE cod_prenda = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE prenda SET nom_prenda          = ? 
				    WHERE cod_prenda = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nom_prenda, 
                        $data->cod_prenda
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Prenda $data)
	{
		try 
		{
		$sql = "INSERT INTO prenda (nom_prenda) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nom_prenda
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}