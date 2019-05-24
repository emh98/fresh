<?php
/**
 * ClienteModel (class worker) :)
 * 
 * Modelo del cliente.
 * 
 * Permite modificar y pedir información del 
 * objeto que representa al cliente.
 * 
 * @author Emanuel Mateus Huepo
 * @package models
 */
class ClienteModel extends Model
{
	/**
	 * 
	 * Variable que representa la cedula del cliente
	 *
	 * @var mixed
	 */
	public $cod_cliente;
	
	/**
	 * Variable que representa el nombre del cliente
	 *
	 * @var mixed
	 */
    public $nom_cliente;


	/**
	 * Contructor del modelo del cliente
	 */
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
		
	}
	

	/**
	 * Metodo que permite eliminar un cliente apartir de la cedula
	 * colocada por parametro.
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function EliminarCliente($id)
	{
		$query = $this->db->connect()->prepare(constant('eliminarCliente'));
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
	 * Metodo que premite actualizar la información de un cliente apartir
	 * de la cedula dada por parametro.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function ActualizarCliente($data)
	{
		$query = $this->db->connect()->prepare(constant('actualizarCliente'));
		try 
		{
			$query->execute([
				'nombre' => $data['nombre'],
				'cedula' => $data['cedula']
			]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}

	}

	/**
	 * Metodo que permite registrar un cliente a través 
	 * del paramatro dado.
	 *
	 * @param array $data
	 * @return mixed
	 */
	public function RegistrarCliente($data)
	{
		try 
		{
			$querry =  $this->db->connect()->prepare(constant('registrarCliente'));
			$querry->execute(['cedula'=> $data['cedula'], 'nombre' => $data['nombre']]);
			return true;
		} catch (PDOException $e) 
		{
			return false;
		}
	}
}