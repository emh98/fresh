<?php

/**
 * FacturaModel (class worker) :)
 * 
 * Modelo de la factura.
 * 
 * Permite modificar y pedir información del 
 * objeto que representa la factura.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class FacturaModel extends Model
{   
	/**
	 * Representa el codigo de la factura
	 *
	 * @var mixed
	 */
	public $cod_factura;
	
	/**
	 * Representa el codigo del cliente que 
	 * se refiere a la factura.
	 *
	 * @var mixed
	 */
	public $cod_cliente;
	
	/**
	 * Representa el valor de la factura
	 *
	 * @var mixed
	 */
	public $val_factura;
	
	/**
	 * Representa la fecha cuando fue creada la factura.
	 *
	 * @var mixed
	 */
	public $fecha;


	/**
	 *Constructor del modelo de la factura.
	 *
	 */
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	/**
	 * Elimina una factura apartir del codigo de la factura
	 * dado por parametro.
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function EliminarFactura($id)
	{
		$query = $this->db->connect()->prepare(constant('eliminarFactura'));
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
	 * Actualiza una factura apartir de un arreglo que llega 
	 * por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function ActualizarFactura($data)
	{
		$query = $this->db->connect()->prepare(constant('actualizarFactura'));
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
			return false;
		}
	}

	/**
	 * Registra una factura apartir de un arreglo dado por parametro.
	 *
	 * @param mixed $data
	 * @return mixed
	 */
	public function RegistrarFactura($data)
	{
		try 
		{
			$querry =  $this->db->connect()->prepare(constant('registrarFactura'));
			$querry->execute(['codF'=> $data['codF'],'cedula'=> $data['cedula'], 'fecha' => $data['fecha']]);
			return true;
		} catch (Exception $e) 
		{
			return false;
		}
	}
}