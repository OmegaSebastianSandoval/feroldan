<?php 
/**
* clase que genera la insercion y edicion  de Contacto en la base de datos
*/
class Administracion_Model_DbTable_Contacto extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'contacto';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'contacto_id';

	/**
	 * insert recibe la informacion de un Contacto y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$contacto_estado = $data['contacto_estado'];
		$contacto_cargo = $data['contacto_cargo'];
		$contacto_correo = $data['contacto_correo'];
		$contacto_telefono = $data['contacto_telefono'];
		$query = "INSERT INTO contacto( contacto_estado, contacto_cargo, contacto_correo, contacto_telefono) VALUES ( '$contacto_estado', '$contacto_cargo', '$contacto_correo', '$contacto_telefono')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Contacto  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$contacto_estado = $data['contacto_estado'];
		$contacto_cargo = $data['contacto_cargo'];
		$contacto_correo = $data['contacto_correo'];
		$contacto_telefono = $data['contacto_telefono'];
		$query = "UPDATE contacto SET  contacto_estado = '$contacto_estado', contacto_cargo = '$contacto_cargo', contacto_correo = '$contacto_correo', contacto_telefono = '$contacto_telefono' WHERE contacto_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}