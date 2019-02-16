<?php
class DetalleModel extends Model
{
    public $cod_detalle;
    public $can_detalle;
    public $cod_factura;
    public $cod_prenda;
	public $cod_servicio;
	public $val_factura;

	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	public function EliminarDetalle($id)
	{
		$query = $this->db->connect()->prepare("DELETE FROM detalle WHERE cod_factura = :id");													
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

	public function ActualizarDetalle($data)
	{

		$query = $this->db->connect()->prepare("UPDATE detalle SET  
														can_detalle = :cantidad, cod_factura = :codF,
														cod_prenda = :codP, cod_servicio = :codS
														WHERE cod_detalle = :codD");
        														
		try 
		{
			$query->execute([
				'codD' => $data['codD'],
				'cantidad' => $data['cantidad'],
				'codF' => $data['codF'],
				'codP' => $data['codP'],
				'codS' => $data['codS']
			]);
			
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}

	public function RegistrarDetalle($factura){
		$sql2 = "UPDATE factura set val_factura = (
			SELECT SUM(val_servicio*can_detalle) 
			FROM  servicio, detalle, prenda 
			where 
			servicio.cod_servicio = detalle.cod_servicio and
			detalle.cod_factura = factura.cod_factura and
			prenda.cod_prenda = detalle.cod_prenda)
where
	factura.cod_factura = ".$factura['codF'];
		$sql = "INSERT INTO detalle (cod_factura,cod_servicio,cod_prenda,can_detalle) VALUES (:codF,:codS,:codP,:cantidad)";
		$query =  $this->db->connect()->prepare($sql);
		$query2 =$this->db->connect()->prepare($sql2);
		try 
		{
			$query->execute([
				'cantidad' => $factura['cantidad'],
				'codF' => $factura['codF'],
				'codP' => $factura['codP'],
				'codS' => $factura['codS']
			]);
			$query2->execute();
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}
	
}