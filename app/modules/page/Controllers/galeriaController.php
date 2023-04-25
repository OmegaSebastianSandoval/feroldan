<?php 

/**
*
*/

class Page_galeriaController extends Page_mainController
{

	public function indexAction()
	{
		$albumModel = new Page_Model_DbTable_Album();
		$this->_view->album = $albumModel->getList("","orden ASC");
	}
	public function detalleAction(){
		$contenidoModel = new Page_Model_DbTable_Fotos();
		$albumModel = new Page_Model_DbTable_Album();
		$this->_view->albumdetalle = $albumModel->getList("","orden ASC");
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->album = $albumModel->getById($identificador);
		$this->_view->fotos = $contenidoModel->getList("fotos_album = $identificador", "orden ASC");
	}

	public function loginAction(){
		$usuario = $this->_getSanitizedParam("name");
		$password = $this->_getSanitizedParam("password");
		if ($this->validacionwebservice($usuario,$password)== true) {
			header("Location: /page/galeria");
		}

		
	}

	public function validacionwebservice($user,$password){
		//API URL
		$url = 'https://zonapferoldan.cyfsoluciones.co/api/api/login/1';

		//create a new cURL resource
		$ch = curl_init($url);

		//setup request to send json via POST
		$data = array(
			"usuario" => "$user",
			"password" => "$password"
		);
		$payload = json_encode($data);

		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//execute the POST request
		$result = curl_exec($ch);

		//close cURL resource
		curl_close($ch);
		
		$arreglo = json_decode($result);
		foreach ($arreglo as $key => $value) {
			if($key == "status"){
				if($value == "success"){
					return true;
				}
				else{
					return false;
				}
			}
		}
	}

}