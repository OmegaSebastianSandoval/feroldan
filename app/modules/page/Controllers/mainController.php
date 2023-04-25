<?php 

/**
*
*/

class Page_mainController extends Controllers_Abstract
{

	public $template;

	public function init()
	{
		$this->setLayout('page_page');
		$this->template = new Page_Model_Template_Template($this->_view);
		$infopageModel = new Page_Model_DbTable_Informacion();
		$informacion = $infopageModel->getById(1);
		$this->_view->infopage = $informacion;
		$this->getLayout()->setData("meta_description","$informacion->info_pagina_descripcion");
		$this->getLayout()->setData("meta_keywords","$informacion->info_pagina_tags");
		$this->getLayout()->setData("scripts","$informacion->info_pagina_scripts");
		$botonesModel = new Page_Model_DbTable_Publicidad();
		$this->_view->botones = $botonesModel->getList("publicidad_seccion='2' AND publicidad_estado='1'","orden ASC");
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$this->_view->botonesnosotros= $contenidoModel->getList("contenido_seccion = '7' AND contenido_padre = '0' AND contenido_estado = '1' ", "orden ASC");
		$this->_view->botonesservicios= $contenidoModel->getList("contenido_seccion = '13' AND contenido_padre = '0'", "orden ASC");
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);
		$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
		$this->getLayout()->setData("footer",$footer);
		$adicionales = $this->_view->getRoutPHP('modules/page/Views/partials/adicionales.php');
		$this->getLayout()->setData("adicionales",$adicionales);
		$this->usuario();
	}


	public function usuario(){
		$userModel = new Core_Model_DbTable_User();
		$user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
		if($user->user_id == 1){
			$this->editarpage = 1;
		}
	}

} 