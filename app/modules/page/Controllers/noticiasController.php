<?php 

/**
*
*/

class Page_noticiasController extends Page_mainController
{

	public function indexAction()
	{ $contenidoModel = new Page_Model_DbTable_Contenido();
		$filters = "contenido_seccion = '4' AND contenido_estado='1'";
		$order = "contenido_fecha DESC, orden ASC";
		$list = $contenidoModel->getListCount($filters,$order)[0];
		$amount = 9;
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
		$this->_view->noticias = $contenidoModel->getListPages($filters,$order,$start,$amount);
	}
    public function detalleAction(){
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->detalle = $contenidoModel->getById($identificador);
		$this->_view->noticia = $contenidoModel->getList("contenido_seccion = '4'", "orden ASC");
	}
}