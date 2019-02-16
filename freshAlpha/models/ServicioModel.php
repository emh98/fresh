<?php
class ServicioModel extends Model
{
  	public $cod_servicio;
	public $nom_servicio;
	public $val_servicio;


	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	public function EliminarServicio($id)
	{
		$query = $this->db->connect()->prepare("DELETE FROM servicio
												WHERE cod_servicio = :id");
		try 
		{
			$query->execute([
				'id' => $data['id']
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function ActualizarServicio($data)
	{
		$query = $this->db->connect()->prepare("UPDATE servicio
												SET nom_servicio = :nomS 
												WHERE cod_servicio = :codS");
		try 
		{
			$query->execute([
				'nomS' => $data['nomS'],
				'codS' => $data['codS']
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function RegistrarServicio($data)
	{
		try 
		{
			$sql = "INSERT INTO servicio (nom_servicio) VALUES (:nombre)";
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