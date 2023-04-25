<?php 
/**
* clase que genera la insercion y edicion  de clasificados en la base de datos
*/
class Administracion_Model_DbTable_Clasificados extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'clasificados';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'clasificados_id';

	/**
	 * insert recibe la informacion de un clasificados y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$clasificados_nombre = $data['clasificados_nombre'];
		$clasificados_introduccion = $data['clasificados_introduccion'];
		$clasificados_descripcion = $data['clasificados_descripcion'];
		$clasificados_categoria = $data['clasificados_categoria'];
		$clasificados_imagen = $data['clasificados_imagen'];
		$clasificados_imagen1 = $data['clasificados_imagen1'];
		$clasificados_imagen2 = $data['clasificados_imagen2'];
		$clasificados_imagen3 = $data['clasificados_imagen3'];
		$clasificados_imagen4 = $data['clasificados_imagen4'];
		$clasificados_nombreusuario = $data['clasificados_nombreusuario'];
		$clasificados_documento = $data['clasificados_documento'];
		$clasificados_correo = $data['clasificados_correo'];
		$clasificados_telefono = $data['clasificados_telefono'];
		$clasificados_estado = $data['clasificados_estado'];
		$query = "INSERT INTO clasificados( clasificados_nombre, clasificados_introduccion, clasificados_descripcion, clasificados_categoria, clasificados_imagen, clasificados_imagen1, clasificados_imagen2, clasificados_imagen3, clasificados_imagen4, clasificados_nombreusuario, clasificados_documento, clasificados_correo, clasificados_telefono, clasificados_estado) VALUES ( '$clasificados_nombre', '$clasificados_introduccion', '$clasificados_descripcion', '$clasificados_categoria', '$clasificados_imagen', '$clasificados_imagen1', '$clasificados_imagen2', '$clasificados_imagen3', '$clasificados_imagen4', '$clasificados_nombreusuario', '$clasificados_documento', '$clasificados_correo', '$clasificados_telefono', '$clasificados_estado')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un clasificados  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$clasificados_nombre = $data['clasificados_nombre'];
		$clasificados_introduccion = $data['clasificados_introduccion'];
		$clasificados_descripcion = $data['clasificados_descripcion'];
		$clasificados_categoria = $data['clasificados_categoria'];
		$clasificados_imagen = $data['clasificados_imagen'];
		$clasificados_imagen1 = $data['clasificados_imagen1'];
		$clasificados_imagen2 = $data['clasificados_imagen2'];
		$clasificados_imagen3 = $data['clasificados_imagen3'];
		$clasificados_imagen4 = $data['clasificados_imagen4'];
		$clasificados_nombreusuario = $data['clasificados_nombreusuario'];
		$clasificados_documento = $data['clasificados_documento'];
		$clasificados_correo = $data['clasificados_correo'];
		$clasificados_telefono = $data['clasificados_telefono'];
		$clasificados_estado = $data['clasificados_estado'];
		$query = "UPDATE clasificados SET  clasificados_nombre = '$clasificados_nombre', clasificados_introduccion = '$clasificados_introduccion', clasificados_descripcion = '$clasificados_descripcion', clasificados_categoria = '$clasificados_categoria', clasificados_imagen = '$clasificados_imagen', clasificados_imagen1 = '$clasificados_imagen1', clasificados_imagen2 = '$clasificados_imagen2', clasificados_imagen3 = '$clasificados_imagen3', clasificados_imagen4 = '$clasificados_imagen4', clasificados_nombreusuario = '$clasificados_nombreusuario', clasificados_documento = '$clasificados_documento', clasificados_correo = '$clasificados_correo', clasificados_telefono = '$clasificados_telefono', clasificados_estado = '$clasificados_estado' WHERE clasificados_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}