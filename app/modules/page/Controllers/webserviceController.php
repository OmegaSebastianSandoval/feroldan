<?php 

/**
*
*/

class Page_webserviceController extends Page_mainController
{

	public function indexAction()
	{
		
	}

	public function loginAction(){
		if ($_SESSION['kt_login_id'] > 0) {
			//header("Location: /page/clasificados");
		}
		$usuario = $this->_getSanitizedParam("name");
		$encuestaid = $this->_getSanitizedParam("encuesta");
		$password = $this->_getSanitizedParam("password");
		$resultado = $this->validacionwebservice($usuario,$password);
		$arreglo = $resultado['arreglo'];
		$infodatos = $resultado['infodatos'];
		$_SESSION['infodatos'] = $infodatos;
		if ( $arreglo->status == 'success') {
			Session::getInstance()->set("kt_login_id",$infodatos->CODASOCIADO);
			Session::getInstance()->set("kt_login_level",2);
			Session::getInstance()->set("kt_login_user",$usuario);
			Session::getInstance()->set("kt_login_name",$infodatos->NOMBRES." ".$infodatos->APELLIDOS);
			if ($encuestaid == "") {
				header("Location: /page/clasificados");
			}
			else {
				header("Location: /page/encuesta?id=".$encuestaid);
			}
		}
	}
	public function validacionwebservice($user="",$password=""){ ;
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

		$resultado = array();
		$arreglo = json_decode($result);
		$infodatos = $this->consultardatos($arreglo->token);

		$resultado['arreglo'] = $arreglo;
		$resultado['infodatos'] = $infodatos;
		return $resultado;

	}

	public function consultardatos($token){

		$data = array();
		$url = 'https://zonapferoldan.cyfsoluciones.co/api/api/dterceros/'.$token;
		$result = file_get_contents($url);
		$arreglo = json_decode($result);

		return $arreglo;

	}

}