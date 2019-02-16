<?php
class FacturaModel extends Model
{   
    public $cod_factura;
    public $cod_cliente;
    public $val_factura;
	public $fecha;

	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	public function EliminarFactura($id)
	{
		$query = $this->db->connect()->prepare("DELETE FROM factura 
												WHERE cod_factura = :id");
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

	public function ActualizarFactura($data)
	{
		$query = $this->db->connect()->prepare("UPDATE factura 
												SET cod_cliente = :cedula, nom_cliente = :nombre 
												WHERE cod_factura = :codF");
		try 
		{
			$query->execute([
				'cedula' => $data['cedula'],
				'nombre' => $data['nombre'],
				'codF' => $data['codF']
			]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function RegistrarFactura($data)
	{
		try 
		{
			$sql = "INSERT INTO factura (cod_factura,cod_cliente,fecha, val_factura) VALUES (:codF,:cedula,:fecha,0)";
			$querry =  $this->db->connect()->prepare($sql);
			$querry->execute(['codF'=> $data['codF'],'cedula'=> $data['cedula'], 'fecha' => $data['fecha']]);
			return true;
		} catch (Exception $e) 
		{
			return false;
		}
	}
}