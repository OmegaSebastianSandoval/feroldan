<?php 

/**
* 
*/
class Page_Model_DbTable_Clasificados extends Db_Table
{
	protected $_name = 'clasificados';
	protected $_id = 'clasificados_id';


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
	
}

