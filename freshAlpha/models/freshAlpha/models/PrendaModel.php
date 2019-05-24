<?php

/**
 * PrendaModel (class worker) :)
 * 
 * Modelo de la prenda.
 * 
 * Permite modificar y pedir información del 
 * objeto que representa la prenda.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class PrendaModel extends Model
{
	/**
	 * Representa el codigo de la prenda.
	 *
	 * @var mixed
	 */
	public $cod_prenda;
	
	/**
	 * Representa el nombre de la prenda.
	 *
	 * @var mixed
	 */
    public $nom_prenda;


	/**
	 * Constructor del modelo de la prenda.
	 */
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	/**
	 * Permite eliminar una prenda apartir del codigo 
	 * de la prenta que ingresa por parametro.
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function EliminarPrenda($id)
	{
		$query = $this->db->connect()->prepare(constant('eliminarPrenda'));
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

	/**
	 * Actualiza la prenda que viene en un arreglo por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function ActualizarPrenda($data)
	{
		$query = $this->db->connect()->prepare(constant('actualizarPrenda'));
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

	/**
	 * Registra una prenda que viene en un arreglo por parametro
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function RegistrarPrenda($data)
	{
		try 
		{
			$querry =  $this->db->connect()->prepare(constant('registrarPrenda'));
			$querry->execute(['nombre' => $data['nombre']]);
			return true;
		} catch (PDOException $e) 
		{
			//echo "Cliente Ya Existe"
			return false;
		}
	}
}