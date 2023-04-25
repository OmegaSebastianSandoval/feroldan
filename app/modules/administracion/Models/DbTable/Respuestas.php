<?php 
/**
* clase que genera la insercion y edicion  de respuestas en la base de datos
*/
class Administracion_Model_DbTable_Respuestas extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'respuestas';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'respuesta_id';

	/**
	 * insert recibe la informacion de un respuestas y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$respuesta_valor = $data['respuesta_valor'];
		$respuesta_pregunta = $data['respuesta_pregunta'];
		$respuesta_usuario = $data['respuesta_usuario'];
		$respuesta_fecha = $data['respuesta_fecha'];
		$respuesta_encuesta = $data['respuesta_encuesta'];
		$query = "INSERT INTO respuestas( respuesta_valor, respuesta_pregunta, respuesta_usuario, respuesta_fecha, respuesta_encuesta) VALUES ( '$respuesta_valor', '$respuesta_pregunta', '$respuesta_usuario', '$respuesta_fecha', '$respuesta_encuesta')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}
	public function agregar($data){
		$respuesta_valor = $data['respuesta_valor'];
		$respuesta_pregunta = $data['respuesta_pregunta'];
		$respuesta_usuario = $data['respuesta_usuario'];
		$respuesta_fecha = $data['respuesta_fecha'];
		$respuesta_encuesta = $data['respuesta_encuesta'];

		$query = " DELETE FROM respuestas WHERE respuesta_usuario='$respuesta_usuario' AND respuesta_pregunta='$respuesta_pregunta'  ";
		//echo $query."<br>";
		$res = $this->_conn->query($query);

		$query = "INSERT INTO respuestas( respuesta_valor, respuesta_pregunta, respuesta_usuario, respuesta_fecha,respuesta_encuesta) VALUES ( '$respuesta_valor', '$respuesta_pregunta', '$respuesta_usuario', '$respuesta_fecha','$respuesta_encuesta')";
		//echo $query."<br>";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}
	/**
	 * update Recibe la informacion de un respuestas  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$respuesta_valor = $data['respuesta_valor'];
		$respuesta_pregunta = $data['respuesta_pregunta'];
		$respuesta_usuario = $data['respuesta_usuario'];
		$respuesta_fecha = $data['respuesta_fecha'];
		$respuesta_encuesta = $data['respuesta_encuesta'];
		$query = "UPDATE respuestas SET  respuesta_valor = '$respuesta_valor', respuesta_pregunta = '$respuesta_pregunta', respuesta_usuario = '$respuesta_usuario', respuesta_fecha = '$respuesta_fecha', respuesta_encuesta = '$respuesta_encuesta' WHERE respuesta_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
	public function getRespuestas($filters = '',$order = '')
    {
        $filter = '';
        if($filters != ''){
            $filter = ' WHERE '.$filters;
        }
        $orders ="";
        if($order != ''){
            $orders = ' ORDER BY '.$order;
        }
      	$select = 'SELECT * FROM '.$this->_name.' LEFT JOIN preguntas ON pregunta_id = respuesta_pregunta '.$filter.' '.$orders;
        $res = $this->_conn->query( $select )->fetchAsObject();
        return $res;
	}
	public function gettabulacionRespuestas($filters = '',$order = '')
    {
        $filter = '';
        if($filters != ''){
            $filter = ' WHERE '.$filters;
        }
        $orders ="";
        if($order != ''){
            $orders = ' GROUP BY '.$order;
        }
      	$select = 'SELECT *, count(respuesta_valor) AS total FROM '.$this->_name.' LEFT JOIN preguntas ON pregunta_id = respuesta_pregunta '.$filter.' '.$orders;
        $res = $this->_conn->query( $select )->fetchAsObject();
        return $res;
    }
}