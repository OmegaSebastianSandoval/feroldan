<?php 

/**
*
*/

class Page_encuestaController extends Page_mainController
{

	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Encuesta();
		$this->namefilter = "parametersfilterencuesta";
		$this->route = "/page/encuesta";
		$this->namepages ="pages_encuesta";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();

	}

	public function indexAction()
	{

		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_encuesta_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		$content = $this->mainModel->getById($id);
		$this->_view->encuesta = $content;

		$modeloPreguntas = new Administracion_Model_DbTable_Preguntas();
		$opcionesModel = new Administracion_Model_DbTable_Opciones();
		$preguntas = $modeloPreguntas->getList(" pregunta_encuesta='$id'  "," pregunta_seccion ASC ");
		foreach ($preguntas as $key => $pregunta) {
			$pregunta_id = $pregunta->pregunta_id;
			$opciones = $opcionesModel->getList(" opcion_pregunta = '$pregunta_id' "," orden ASC ");
			$pregunta->opciones = $opciones;
		}
		$this->_view->preguntas = $preguntas;

		$usuario = $_SESSION['cedula'];
		if($usuario==""){
			$usuario = $_SESSION['kt_login_user'];
		}
		$this->_view->usuario = $usuario;

		$cedula = $_SESSION['kt_login_user'];

		if($_SESSION['kt_login_id'] == ""){
			header("Location: /page/webservice/login?encuesta=".$id);
		}
		if($cedula!=""){
			$modeloRespuestas = new Administracion_Model_DbTable_Respuestas();
			$existe = $modeloRespuestas->getList(" respuesta_usuario='$cedula' ","");
			if(count($existe)>0){
				header("Location: /page/encuesta/yallenoencuesta");
			}
		}

	}



	public function guardarAction()
	{
		$this->_view->route = $this->route;
		$modeloRespuestas = new Administracion_Model_DbTable_Respuestas();

		$encuesta = $this->_getSanitizedParam("encuesta");
		$usuario = $this->_getSanitizedParam("usuario");
		$modeloPreguntas = new Page_Model_DbTable_Preguntas();
		$preguntas = $modeloPreguntas->getList(" pregunta_encuesta='$encuesta'  ","");
		$hoy = date("Y-m-d H:i:s");
		foreach ($preguntas as $key => $pregunta) {
			$id = $pregunta->pregunta_id;

			$data['respuesta_valor'] = $this->_getSanitizedParam("pregunta".$id);
			$data['respuesta_pregunta'] = $id;
			$data['respuesta_usuario'] = $usuario;
			$data['respuesta_fecha'] = $hoy;
			$data['respuesta_encuesta'] = $id;

			$modeloRespuestas->agregar($data);
		}
	}

	public function logoutAction()
	{
		//LOG
		$data['log_tipo'] = "LOGOUT";
		$logModel = new Administracion_Model_DbTable_Log();
		$logModel->insert($data);

		Session::getInstance()->set("kt_login_id","");
		Session::getInstance()->set("kt_login_level","");
		Session::getInstance()->set("kt_login_user","");
		Session::getInstance()->set("kt_login_name","");
		header('Location: /page/index');
	}

	public function yallenoencuestaAction()
	{
	}

}