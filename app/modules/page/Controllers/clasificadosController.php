<?php 

/**
*
*/
class Page_clasificadosController extends Page_mainController
{

	public function indexAction()
	{
		$contentModel = new Page_Model_DbTable_Clasificados();
		$filters = " clasificados_estado = '1' ";
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->activo = $identificador;
		if ($identificador>0 && $identificador!=="") {
			$filters .= " AND clasificados_categoria = '$identificador' ";
		}
		$order = "orden ASC";
		$list = $contentModel->getListCount($filters,$order)[0];
		$amount = 5;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
		$start = 0;
		$page=1;
		}
		else {
		$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil($list->total/$amount);
		$this->_view->page = $page;
		$this->_view->clasificados = $contentModel->getListPages($filters,$order,$start,$amount);
		$contentModel = new Page_Model_DbTable_Categorias();
		$this->_view->categoria = $contentModel->getList("","orden ASC");
	}
	public function detalleAction(){
		$contentModel = new Page_Model_DbTable_Clasificados();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->producto = $contentModel->getById($identificador);
	}
	public function enviarclasificadoAction(){
		$asociadosModel = new Page_Model_DbTable_Asociados();
		$buscar = $this->_getSanitizedParam("id");
		$filter = " asociados_cedula = '$buscar'";
		$this->_view->buscar = $asociadosModel->getList($filter, "")[0];
		$this->_view->cedula = $buscar;
	}
	public function insertAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['clasificados_imagen']['name'] != ''){
				$data['clasificados_imagen'] = $uploadImage->upload("clasificados_imagen");
			}
			if($_FILES['clasificados_imagen1']['name'] != ''){
				$data['clasificados_imagen1'] = $uploadImage->upload("clasificados_imagen1");
			}
			if($_FILES['clasificados_imagen2']['name'] != ''){
				$data['clasificados_imagen2'] = $uploadImage->upload("clasificados_imagen2");
			}
			if($_FILES['clasificados_imagen3']['name'] != ''){
				$data['clasificados_imagen3'] = $uploadImage->upload("clasificados_imagen3");
			}
			if($_FILES['clasificados_imagen4']['name'] != ''){
				$data['clasificados_imagen4'] = $uploadImage->upload("clasificados_imagen4");
			}
			$clasificadosModel = new Page_Model_DbTable_Clasificados();
			$id = $clasificadosModel->insert($data);
			$clasificadosModel->changeOrder($id,$id);
			$email = new Core_Model_Sendingemail($this->_view);
            $res = $email->confirmacion($data);
            header("Location: /page/clasificados/confirmacion?clasificado=".$id);
		}

	}
	private function getData()
	{ 
		$data = array();
		$data['clasificados_nombre'] = $this->_getSanitizedParam("clasificados_nombre");
		$data['clasificados_introduccion'] = $this->_getSanitizedParamHtml("clasificados_introduccion");
		$data['clasificados_descripcion'] = $this->_getSanitizedParamHtml("clasificados_descripcion");
		if($this->_getSanitizedParam("clasificados_categoria") == '' ) {
			$data['clasificados_categoria'] = '0';
		} else {
			$data['clasificados_categoria'] = $this->_getSanitizedParam("clasificados_categoria");
		}
		$data['clasificados_imagen'] = "";
		$data['clasificados_imagen1'] = "";
		$data['clasificados_imagen2'] = "";
		$data['clasificados_imagen3'] = "";
		$data['clasificados_imagen4'] = "";
		$data['clasificados_nombreusuario'] = $this->_getSanitizedParam("clasificados_nombreusuario");
		$data['clasificados_documento'] = $this->_getSanitizedParam("clasificados_documento");
		$data['clasificados_correo'] = $this->_getSanitizedParam("clasificados_correo");
		$data['clasificados_telefono'] = $this->_getSanitizedParam("clasificados_telefono");
		if($this->_getSanitizedParam("clasificados_estado") == '' ) {
			$data['clasificados_estado'] = '0';
		} else {
			$data['clasificados_estado'] = $this->_getSanitizedParam("clasificados_estado");
		}
		return $data;
	}
	public function confirmacionAction(){
		$contentModel = new Page_Model_DbTable_Clasificados();
		$identificador = $this->_getSanitizedParam("clasificado");
		$this->_view->confirmacion = $contentModel->getById($identificador);
	}
}