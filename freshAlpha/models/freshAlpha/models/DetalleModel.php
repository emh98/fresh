<?php
/**
 * DetalleModel (class worker) :)
 * 
 * Modelo del detalle.
 * 
 * Permite modificar y pedir información del 
 * objeto que representa al detalle.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class DetalleModel extends Model
{
	/**
	 * Representa el codigo del detalle de una factura.
	 *
	 * @var mixed
	 */
	public $cod_detalle;
	
	/**
	 * Representa la cantidad de una prenda que hay 
	 * en el detalle de la factura.
	 *
	 * @var mixed
	 */
	public $can_detalle;
	
	/**
	 * Representa el codigo de la factura a la que esta asociada 
	 * el detalle.
	 *
	 * @var mixed
	 */
	public $cod_factura;
	
	/**
	 * Codigo de la prenda que tiene el detalle de la factura.
	 *
	 * @var [type]
	 */
	public $cod_prenda;
	
	/**
	 * Codigo del servicio que se le realizara a la prenda.
	 *
	 * @var mixed
	 */
	public $cod_servicio;

	/**
	 * Valor de la factura.
	 *
	 * @var mixed
	 */
	public $val_factura;


	/**
	 * Constructor del modelo del detalle
	 *
	 * @return void
	 */
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	/**
	 * Elimina un detalle apartir del 
	 * código dado por parametro.
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function EliminarDetalle($id)
	{
		$query = $this->db->connect()->prepare(constant('eliminarDetalle'));
		try 
		{
			$query->execute([
				'id' => $id
			]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}

	/**
	 * Actualiza el detalle dado por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function ActualizarDetalle($data)
	{

		$query = $this->db->connect()->prepare(constant('actualizarDetalle'));
        														
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
			return false;
		}
	}

	/**
	 * Metodo que registra el detalle apartir del parametro dado.
	 *
	 * @param array $factura
	 * @return mixed
	 */
	public function RegistrarDetalle($factura){
		$query =  $this->db->connect()->prepare(constant('registrarDetalle1'));
		$query2 =$this->db->connect()->prepare(constant('registrarDetalle2'));
		try 
		{
			$query->execute([
				'cantidad' => $factura['cantidad'],
				'codF' => $factura['codF'],
				'codP' => $factura['codP'],
				'codS' => $factura['codS']
			]);
			$query2->execute([
				'codF' => $factura['codF']
			]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}
	
}