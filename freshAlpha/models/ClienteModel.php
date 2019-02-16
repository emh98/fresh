<?php
class ClienteModel extends Model
{
    public $cod_cliente;
    public $nom_cliente;


	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
		
	}
	

	public function EliminarCliente($id)
	{
		$query = $this->db->connect()->prepare("DELETE FROM cliente 
												WHERE cod_cliente = :id");
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

	public function ActualizarCliente($data)
	{
		$query = $this->db->connect()->prepare("UPDATE cliente 
												SET nom_cliente = :nombre 
												WHERE cod_cliente = :cedula");
		try 
		{
			$query->execute([
				'nombre' => $data['nombre'],
				'cedula' => $data['cedula']
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}

	}

	public function RegistrarCliente($data)
	{
		try 
		{
			$sql = "INSERT INTO cliente (cod_cliente,nom_cliente) VALUES (:cedula,:nombre)";
			$querry =  $this->db->connect()->prepare($sql);
			$querry->execute(['cedula'=> $data['cedula'], 'nombre' => $data['nombre']]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}
}