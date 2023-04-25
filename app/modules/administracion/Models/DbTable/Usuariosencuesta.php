<?php 
/**
* clase que genera la insercion y edicion  de usuarios encuesta en la base de datos
*/
class Administracion_Model_DbTable_Usuariosencuesta extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'usuarios_encuesta';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'usuario_encuesta_id';

	/**
	 * insert recibe la informacion de un usuario y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$usuario_encuesta_documento = $data['usuario_encuesta_documento'];
		$usuario_encuesta_nombre = $data['usuario_encuesta_nombre'];
		$usuario_encuesta_encuesta = $data['usuario_encuesta_encuesta'];
		$usuario_encuesta_fecha = $data['usuario_encuesta_fecha'];
		$query = "INSERT INTO usuarios_encuesta( usuario_encuesta_documento, usuario_encuesta_nombre, usuario_encuesta_encuesta, usuario_encuesta_fecha) VALUES ( '$usuario_encuesta_documento', '$usuario_encuesta_nombre', '$usuario_encuesta_encuesta', '$usuario_encuesta_fecha')";
		//echo $query."<br>";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un usuario  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$usuario_encuesta_documento = $data['usuario_encuesta_documento'];
		$usuario_encuesta_nombre = $data['usuario_encuesta_nombre'];
		$usuario_encuesta_encuesta = $data['usuario_encuesta_encuesta'];
		$usuario_encuesta_fecha = $data['usuario_encuesta_fecha'];
		$query = "UPDATE usuarios_encuesta SET  usuario_encuesta_documento = '$usuario_encuesta_documento', usuario_encuesta_nombre = '$usuario_encuesta_nombre', usuario_encuesta_encuesta = '$usuario_encuesta_encuesta', usuario_encuesta_fecha = '$usuario_encuesta_fecha' WHERE usuario_encuesta_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}