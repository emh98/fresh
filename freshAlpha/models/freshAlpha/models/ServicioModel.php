<?php
/**
 * ServicioModel (class worker) :)
 * 
 * Modelo del servicio.
 * 
 * Permite modificar y pedir información del 
 * objeto que representa al servicio.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class ServicioModel extends Model
{
	/**
	 * Representa el codigo del servicio
	 *
	 * @var mixed
	 */
	public $cod_servicio;
	
	/**
	 * Representa el nombre del servicio.
	 *
	 * @var mixed
	 */
	public $nom_servicio;

	/**
	 * Representa el valor del servicio.
	 *
	 * @var mixed
	 */
	public $val_servicio;

	/**
	 * Constructor del modelo del servicio.
	 *
	 */
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	/**
	 * Elimina un servicio por el codigo del servicio dado por parametro.
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function EliminarServicio($id)
	{
		$query = $this->db->connect()->prepare(constant('eliminarServicio'));
		try 
		{
			$query->execute([
				'id' => $data['id']
			]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}

	/**
	 * Actualiza un servicio que viene en un arreglo por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function ActualizarServicio($data)
	{
		$query = $this->db->connect()->prepare(constant('actualizarServicio'));
		try 
		{
			$query->execute([
				'nomS' => $data['nomS'],
				'codS' => $data['codS']
			]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}

	/**
	 * Registra el servicio que viene en un arreglo por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function RegistrarServicio($data)
	{
		try 
		{
			$querry =  $this->db->connect()->prepare(constant('registrarServicio'));
			$querry->execute(['nombre' => $data['nombre']]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}
}