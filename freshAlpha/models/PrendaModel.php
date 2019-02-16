<?php
class PrendaModel extends Model
{
    public $cod_prenda;
    public $nom_prenda;


	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	public function Eliminar($id)
	{
		$query = $this->db->connect()->prepare("DELETE FROM prenda 
												WHERE cod_prenda = :id");
		try 
		{
			$query->execute([
				'id' => $id
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function Actualizar($data)
	{
		$query = $this->db->connect()->prepare("UPDATE prenda 
												SET nom_prenda = :nomP 
												WHERE cod_prenda = :codP");
		try 
		{
			$query->execute([
				'nomP' => $data['nomP'],
				'codP' => $data['codP']
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function Registrar($data)
	{
		try 
		{
			$sql = "INSERT INTO prenda (nom_prenda) VALUES (:nombre)";
			$querry =  $this->db->connect()->prepare($sql);
			$querry->execute(['nombre' => $data['nombre']]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}
}